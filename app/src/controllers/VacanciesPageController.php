<?php

namespace PathwayAI\Controllers;

use PathwayAI\Partials\Vacancy;
class VacanciesPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'VacanciesPage',
			'Page'
		]);
	}

	public function getVacancies()
    {
        return Vacancy::get();
    }
}
