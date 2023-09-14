<?php

namespace App\Http\Controllers;

use App\Helpers\Services;
use Illuminate\Http\Request;

class AuthController extends Controller
{
     public function login()
     {
          if (session()->has('accessToken')) return redirect()->route('dashboards.index');

          return view('auth.login');
     }

     public function register()
     {
          if (session()->has('accessToken')) return redirect()->route('dashboards.index');

          return view('auth.register');
     }

     public function authenticate(Request $request)
     {
          $usernameOrEmail = $request->input('usernameOrEmail');
          $password = $request->input('password');

          $login = Services::login($usernameOrEmail, $password);

          if (!$login['status']) {
               return redirect()->back()->with('error', $login['message']);
          } else {
               session()->put('accessToken', $login['accessToken']);
               session()->put('refreshToken', $login['refreshToken']);
               session()->put('user', $login['user']);

               return redirect()->route('index');
          }
     }

     public function logout()
     {
          session()->forget('accessToken');
          session()->forget('refreshToken');
          session()->forget('user');

          return redirect()->route('login');
     }
}
