<?php

    Class UsersController extends BaseController
    {
        public function index()
        {
            return View::make('dashboard.login');
        }
    }