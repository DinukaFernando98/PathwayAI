<?php

namespace PathwayAI\Controllers;

use PathwayAI\Partials\Event;
class EventsPageController extends \PageController
{
	public function index()
	{
		return $this->renderWith([
			'EventsPage',
			'Page'
		]);
	}

	public function getEvents()
    {
        return Event::get();
    }
}
