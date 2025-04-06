<?php

namespace PathwayAI\Tests\Partials;

use PathwayAI\Partials\Course;
use PathwayAI\Partials\Company;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Core\Environment;

class CourseTest extends SapphireTest
{
    protected function setUp(): void
    {
        parent::setUp();
        Environment::setEnv('SS_DATABASE_NAME', 'ss_test');
    }

    public function testCourseCreation()
    {
        // Create a company for the course to be hosted by
        $company = new Company();
        $company->Name = 'Test Company for Courses';
        $company->Email = 'courses@testcompany.com';
        $company->Description = 'A company offering test courses';
        $company->write();

        // Create a new course instance
        $course = new Course();
        $course->CourseType = 'Information Technology';
        $course->Title = 'Test IT Course';
        $course->Duration = '3 months';
        $course->Link = 'https://test-it-course.com';
        $course->HostID = $company->ID; // Associate the course with the created company
        $course->write();

        // Retrieve the course from the database
        $retrievedCourse = Course::get()->filter('Title', 'Test IT Course')->first();

        // Assert that the course was created successfully
        $this->assertNotNull($retrievedCourse, 'Course should be created and retrievable');
        $this->assertEquals('Test IT Course', $retrievedCourse->Title, 'Course title should match');
        $this->assertEquals('Information Technology', $retrievedCourse->CourseType, 'Course type should match');
        $this->assertEquals('3 months', $retrievedCourse->Duration, 'Course duration should match');
        $this->assertEquals('https://test-it-course.com', $retrievedCourse->Link, 'Course link should match');
    }

}
