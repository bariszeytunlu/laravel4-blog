<?php

namespace Dashboard;

use BaseDashboardController;

use View;



    Class UsersController extends BaseDashboardController
    {
        public function index()
        {

            if ( Auth::check('user')) {
                return Redirect::to('dashboard/home');
            } else {
                return View::make('dashboard.login');
            }
        }
    }