<?php

namespace Dashboard;

use BaseDashboardController;

use View;



    Class UsersController extends BaseDashboardController
    {
        public function index()
        {
            return View::make('dashboard.login');
        }
    }