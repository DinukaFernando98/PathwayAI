<?php

namespace {

    use PathwayAI\Partials\User;
    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Core\Environment;
    use SilverStripe\View\Requirements;
    use SilverStripe\View\SSViewer;

    class PageController extends ContentController
	{
		/**
		 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
		 * permissions or conditions required to allow the user to access it.
		 *
		 * <code>
		 * [
		 *     'action', // anyone can access this action
		 *     'action' => true, // same as above
		 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
		 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
		 * ];
		 * </code>
		 *
		 * @var array
		 */
		private static $allowed_actions = [];

		protected function init()
		{
			parent::init();
			$env_type = Environment::getEnv('SS_ENVIRONMENT_TYPE');

            if ($env_type == 'live') {
                $file_dir = 'build';
            } else {
                $file_dir = 'dist';
            }

            $theme = SSViewer::get_themes();
            $theme = reset($theme);

			$this->customise([
				'IsLoggedIn' => $this->isLoggedIn(),
				'LoggedInUser' => $this->getLoggedInUser()
			]);
		}

		// check if the user is logged in
		public function isLoggedIn()
		{
			$session = $this->getRequest()->getSession();
			return $session->get('LoggedInUserID') ? true : false;
		}

		public function getLoggedInUser()
		{
			$session = $this->getRequest()->getSession();
			$userID = $session->get('LoggedInUserID');
			if ($userID) {
				return User::get()->byID($userID);
			}
			return null;
		}


        public function getMainNavigation()
        {
            return Page::get()->filter('ShowInMainNav', true);
        }

        public function getFooterNavigation()
        {
            return Page::get()->filter('ShowInFooterNav', true);
        }
	}
}
