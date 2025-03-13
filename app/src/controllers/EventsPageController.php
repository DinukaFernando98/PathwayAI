<?php

namespace PathwayAI\Controllers;

class EventsPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'EventsPage',
			'Page'
		]);
	}
}
