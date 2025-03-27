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

class PathwayPageController extends \PageController
{
    protected function init()
    {
        parent::init();

		$session = $this->getRequest()->getSession();
		$userID = $session->get('LoggedInUserID');
	
		// Check if user is logged in, if not, redirect to sign-in
		if (!$userID) {
			return $this->redirect('/sign-in');
		}

		if (!session_id()) {
			session_start();
		}
    }

    public function index(HTTPRequest $request)
    {
        // Get logged in user
        $user = $this->getLoggedInUser();

        // Fetch career pathway data from JSearch API based on user data (entry level, interested area)
        $careerData = $this->getSalaries($user);

        $parameters = new ArrayData($careerData['parameters'] ?? []);

        // Convert Career Data to SilverStripe ArrayList
        $careerDataList = new ArrayList();
        foreach ($careerData['data'] ?? [] as $item) {
            $careerDataList->push(new ArrayData($item));
        }

        $careerPathData = $this->getCareerPathway($user);

        $careerPathDataList = new ArrayList();
        foreach ($careerPathData as $item) {
            $careerPathDataList->push($item); 
        }

    // Fetch more jobs from LinkedIn API
    $jobTitle = 'Software Engineer'; 
    //$linkedInJobs = $this->getLinkedInJobs($jobTitle);

   //var_dump($linkedInJobs);

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
        'Parameters' => $parameters,
        'CareerDataList' => $careerDataList,
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
        return $value; // Return the value as is if it's not a string
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

    // Method to fetch career pathway and salary estimation from JSearch API
    private function getSalaries($user)
{
    // Assuming you have the user's entry level and interested area stored
    $entryLevel = $user->EntryLevel;  // For example, "School Leaver", "Undergraduate", etc.
    $interestedArea = $user->InterestedArea;  // e.g., "Information Technology", "Business Management", etc.

    // Build API URL based on user data
    $jobTitle = 'Software Developer'; // Map interested area to job title
    $location = 'Sri Lanka'; // You can make this dynamic based on user preferences or location data
    $client = new Client();
    try {
        // Make the GET request to the Active Jobs API with job title and location filters
        $response = $client->request('GET', 'https://jsearch.p.rapidapi.com/estimated-salary', [
            'query' => [
                'job_title' => 'nodejs developer',
                'location' => 'United States',
                'location_type' => 'ANY',
                'years_of_experience' => 'ALL',
            ],
            'headers' => [
                'x-rapidapi-host' => 'jsearch.p.rapidapi.com',
                'x-rapidapi-key' => 'dd3dd3e240mshd0f81f339e687cap19c507jsn68c230902d00'  // Replace with your actual RapidAPI key
            ]
        ]);

        // Parse the response body and return the data
        $data = json_decode($response->getBody()->getContents(), true);

        return $data;  // Return the data, which you can use in your view or logic
    } catch (\Exception $e) {
        // Handle any errors that might occur during the request
        return ['error' => 'An error occurred while fetching job listings: ' . $e->getMessage()];
    }
}

private function getLinkedInJobs($jobTitle)
{
    $client = new Client();

    try {
        // Make the GET request to LinkedIn Job API with the job title filter
        $response = $client->request('GET', 'https://linkedin-job-search-api.p.rapidapi.com/active-jb-24h', [
            'query' => [$jobTitle, // Pass the job title as a query parameter
            ],
            'headers' => [
                'x-rapidapi-host' => 'linkedin-job-search-api.p.rapidapi.com',
                'x-rapidapi-key' => 'dd3dd3e240mshd0f81f339e687cap19c507jsn68c230902d00' // Replace with actual API key
            ]
        ]);

        // Parse the response body
        $data = json_decode($response->getBody()->getContents(), true);

        return $data;

    } catch (\Exception $e) {
        // Handle errors
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

        // Decode the JSON output from the Python script
        $result = json_decode($process->getOutput(), true);

        if (isset($result['career_path'])) {
            // Map the career path steps to ArrayData (using associative arrays)
            $careerPathDataList = [];
            foreach ($result['career_path'] as $step) {
                $careerPathDataList[] = new ArrayData(['CareerStep' => $step]);  // Use 'CareerStep' as key
            }
    
            return $careerPathDataList;
        }
    
    }

    public function getJobPredictions($jobTitle)
    {
        // Ensure the job title is properly formatted
        $jobTitle = trim($jobTitle);

        // Call the Python script and pass the job title
        $process = new Process(['python', 'python/predict_job_info.py', $jobTitle]);
        $process->run();

        // Decode the JSON output from the Python script
        $result = json_decode($process->getOutput(), true);

        // Check if the process was successful
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Decode the JSON output from the Python script
        $result = json_decode($process->getOutput(), true);

        // var_dump($result);
        // die('hi');

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
