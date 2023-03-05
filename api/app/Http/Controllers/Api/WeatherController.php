<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;



class WeatherController extends Controller
{
    public function weatherForAllUsers(WeatherService $service)
    {
        $result = $service->weatherForAllUsers();
        return $result;
        
    }
}
