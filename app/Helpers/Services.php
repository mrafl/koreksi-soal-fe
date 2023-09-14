<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Services
{
     public static function post($endpoint, $data = [])
     {
          $headers = ["Authorization" => "Bearer " . session()->get("accessToken")];

          return Http::withHeaders($headers)->post(env("BACKEND_URL") . $endpoint, $data);
     }
     
     public static function put($endpoint, $data = [])
     {
          $headers = ["Authorization" => "Bearer " . session()->get("accessToken")];

          return Http::withHeaders($headers)->put(env("BACKEND_URL") . $endpoint, $data);
     }

     public static function get($endpoint, $data = [])
     {
          $headers = ["Authorization" => "Bearer " . session()->get("accessToken")];

          return Http::withHeaders($headers)->get(env("BACKEND_URL") . $endpoint, $data);
     }

     public static function login($usernameOrEmail, $password)
     {
          return Services::post("/auth/login", [
               "usernameOrEmail" => $usernameOrEmail,
               "password" => $password
          ]);
     }
}
