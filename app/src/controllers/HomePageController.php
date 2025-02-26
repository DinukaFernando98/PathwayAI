<?php

namespace PathwayAI\Controllers;

class HomePageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'HomePage',
			'Page'
		]);
	}
}
