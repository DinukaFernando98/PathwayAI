<?php

namespace PathwayAI\Tests\Partials;

use PathwayAI\Partials\Company;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Core\Environment;

class CompanyTest extends SapphireTest
{
    protected function setUp(): void
    {
        parent::setUp();
        Environment::setEnv('SS_DATABASE_NAME', 'ss_test');
    }

    public function testCompanyCreation()
    {
        // Create a new company instance
        $company = new Company();
        $company->Name = 'New Test Company';
        $company->Email = 'contact@newtestcompany.com';
        $company->Description = 'This is a new test company description';
        
        // Save the company
        $company->write();

        // Retrieve the company from the database
        $retrievedCompany = Company::get()->filter('Email', 'contact@newtestcompany.com')->first();

        // Assert that the company was successfully created
        $this->assertNotNull($retrievedCompany, 'Company should be created and retrievable');
        $this->assertEquals('New Test Company', $retrievedCompany->Name, 'Company name should match');
        $this->assertEquals('contact@newtestcompany.com', $retrievedCompany->Email, 'Company email should match');
        $this->assertEquals('This is a new test company description', $retrievedCompany->Description, 'Company description should match');
    }
}
