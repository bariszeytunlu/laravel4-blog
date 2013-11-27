<?php

namespace Dashboard;

use BaseDashboardController;

use View;
use Auth;
use Redirect;
use Session;
use Input;
use Hash;
use User;


    Class UsersController extends BaseDashboardController
    {
        // Show to user login page
        public function index()
        {

            if ( Auth::check('user')) {
                return Redirect::route('home');
            } else {
                return View::make('dashboard.users.login');
            }
        }

        public function SignIn() {

            $user = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            $validation = User::validate($user);
            if ($validation->passes()) {

                if ( Auth::attempt($user) ) {
                    return Redirect::route('home');
                }
            }
                    return Redirect::route('login')
                    ->withErrors($validation)->withInput();


        }

        public function logout() {
            Auth::logout();
            Session::forget('barisBlog');
            return Redirect::route('login');
        }
    }