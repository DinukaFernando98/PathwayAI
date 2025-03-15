<?php

namespace PathwayAI\Controllers;

use PathwayAI\Partials\Course;
class CoursesPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'CoursesPage',
			'Page'
		]);
	}

	public function getCourses()
    {
        return Course::get();
    }
}
