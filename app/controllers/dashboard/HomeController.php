<?php


namespace Dashboard;

use BaseDashboardController;

use View;

class HomeController extends BaseDashboardController {

    public function index() {

        return View::make('dashboard.home.index');

    }

}