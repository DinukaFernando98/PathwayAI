<?php

namespace PathwayAI\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use PathwayAI\Partials\User;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use SilverStripe\Core\Environment;

class PathwayPageController extends \PageController
{
    protected function init()
    {
        parent::init();

		$session = $this->getRequest()->getSession();
		$userID = $session->get('LoggedInUserID');
	
		if (!$userID) {
			return $this->redirect('/sign-in');
		}

		if (!session_id()) {
			session_start();
		}
    }

    public function index(HTTPRequest $request)
    {
        $user = $this->getLoggedInUser();
        $careerPathData = $this->getCareerPathway($user);

        $careerPathDataList = new ArrayList();
        foreach ($careerPathData as $item) {
            $careerPathDataList->push($item); 
        }

        // Fetch users interested position
        $jobTitle = $user->InterestedPosition;

        //$linkedInJobs = $this->getLinkedInJobs($jobTitle);
        // Convert LinkedIn Jobs to SilverStripe ArrayList
        // $linkedInJobsList = new ArrayList();
        // foreach ($linkedInJobs as $job) {
        //     $linkedInJobsList->push(new ArrayData($job));
        // }

        $predictions = $this->getJobPredictions($jobTitle);

        return $this->renderWith([
            'PathwayPage',
            'Page'
        ], [
            'careerPathDataList' => $careerPathDataList,
            'JobPrediction' => $predictions
            // 'LinkedInJobsList' => $linkedInJobsList
        ]);
    }

    public function forTemplate()
    {
        $value = parent::forTemplate() ?? '';
        if (is_string($value)) {
            return nl2br($value);
        }
        return $value;
    }

    public function getLoggedInUser()
    {
        $session = $this->getRequest()->getSession();

        if (!session_id()) {
            session_start();
        }

        $userID = $session->get('LoggedInUserID');
        if ($userID) {
            return User::get()->byID($userID);
        }
        return null;
    }

    private function getLinkedInJobs($jobTitle)
    {
        $client = new Client();
        $apiKey = Environment::getEnv('LINKEDIN_API_KEY');

        try {
            $response = $client->request('GET', 'https://linkedin-job-search-api.p.rapidapi.com/active-jb-24h', [
                'query' => [$jobTitle,
                ],
                'headers' => [
                    'x-rapidapi-host' => 'linkedin-job-search-api.p.rapidapi.com',
                    'x-rapidapi-key' => $apiKey
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            return $data;

        } catch (\Exception $e) {
            return ['error' => 'An error occurred while fetching job listings: ' . $e->getMessage()];
        }
    }

    private function getCareerPathway($user)
    {
        $userarea = $user->InterestedArea;

        if (is_string($userarea)) {
            $decodedArea = json_decode($userarea, true);
            if (is_array($decodedArea)) {
                $interestedArea = $decodedArea[0];
            } else {
                $interestedArea = $userarea;
            }
        } else {
            $interestedArea = $userarea[0] ?? '';
        }

        // Call the Python script to get the career path for the user's area
        $process = new Process(['python', 'python/predict_career.py', $interestedArea]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = json_decode($process->getOutput(), true);

        if (isset($result['career_path'])) {
            $careerPathDataList = [];
            foreach ($result['career_path'] as $step) {
                $careerPathDataList[] = new ArrayData(['CareerStep' => $step]);
            }
    
            return $careerPathDataList;
        }
    
    }

    public function getJobPredictions($jobTitle)
    {
        $jobTitle = trim($jobTitle);

        // Call the Python script to predict job info
        $process = new Process(['python', 'python/predict_job_info.py', $jobTitle]);
        $process->run();

        $result = json_decode($process->getOutput(), true);

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $result = json_decode($process->getOutput(), true);

        if (isset($result[$jobTitle])) {
            return new ArrayData([
                'JobTitle' => $jobTitle,
                'SalaryRange' => $result[$jobTitle]['Salary Range'] ?? 'N/A',
                'ExperienceRequired' => $result[$jobTitle]['Experience Required'] ?? 'N/A',
                'QualificationsRequired' => new ArrayList(array_map(function ($q) {
                    return new ArrayData(['Qualification' => $q]);
                }, $result[$jobTitle]['Qualifications Required'] ?? []))
            ]);
        } else {
            return new ArrayData([
                'JobTitle' => $jobTitle,
                'Error' => 'No predictions available for this job title.'
            ]);
        }
    }

}
