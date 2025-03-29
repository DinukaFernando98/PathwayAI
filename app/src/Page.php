<?php

namespace {

	use DNADesign\Elemental\Extensions\ElementalPageExtension;
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
            'Subheading' => 'Varchar'
        ];

        private static $extensions = [
            ElementalPageExtension::class
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->removeByName('Content');
            $fields->removeByName('Metadata');

			$fields->addFieldsToTab('Root.Hero', [
                HTMLEditorField::create('Heading', 'Heading')->setRows(4),
                TextField::create('Subheading', 'Subheading')
			]);

            return $fields;
        }
    }
}
