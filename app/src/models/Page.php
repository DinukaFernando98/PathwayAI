<?php

namespace {

	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\CheckboxField;

    class Page extends SiteTree
    {

        private static $db = [
            'ShowInMainNav' => 'Boolean',
            'ShowInFooterNav' => 'Boolean'
        ];

		private static $has_one = [
			'Image' => Image::class
		];

		private static $owns = [
			'Image'
		];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

			$fields->addFieldsToTab('Root.Hero', [
				UploadField::create('Image', 'Image')
					->setFolderName('HeroImages')
			]);

            return $fields;
        }

        function getSettingsFields()
        {
            $fields = parent::getSettingsFields();

            $fields->addFieldsToTab('Root.Settings', [
                CheckboxField::create('ShowInMainNav', 'Show in main navigation?'),
                CheckboxField::create('ShowInFooterNav', 'Show in footer navigation?')
            ], 'ShowInMenus');

            return $fields;
        }
    }
}
