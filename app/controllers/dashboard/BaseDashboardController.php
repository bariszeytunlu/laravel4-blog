<?php

class BaseDashboardController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

    protected $layout = 'dashboard.layouts.dashboard';

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

        
	}



}