<?php

namespace {

	use SilverStripe\AssetAdmin\Forms\UploadField;
	use SilverStripe\Assets\Image;
	use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\Forms\TextField;

    class Page extends SiteTree
    {

        private static $db = [
            'Heading' => 'HTMLText',
            'Subheading' => 'Varchar',
            'ShowInMainNav' => 'Boolean',
            'ShowInFooterNav' => 'Boolean'
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

			$fields->addFieldsToTab('Root.Hero', [
                HTMLEditorField::create('Heading', 'Heading')->setRows(4),
                TextField::create('Subheading', 'Subheading')
			]);

            return $fields;
        }

        function getSettingsFields()
        {
            $fields = parent::getSettingsFields();
            $fields->removeByName('Content');
            $fields->removeByName('Metadata');

            $fields->addFieldsToTab('Root.Settings', [
                CheckboxField::create('ShowInMainNav', 'Show in main navigation?'),
                CheckboxField::create('ShowInFooterNav', 'Show in footer navigation?')
            ], 'ShowInMenus');

            return $fields;
        }
    }
}
