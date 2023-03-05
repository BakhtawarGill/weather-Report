<?php

namespace App\Services;

use App\Models\Weather;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\User;

class WeatherService
{
    public function weatherForAllUsers()
    {

        $users = User::all();
        $apiKey =  env('OPEN_WEATHER_KEY');



        for ($i = 0; $i < count($users); $i++) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.openweathermap.org/data/2.5/weather?lat=".$users[$i]['latitude']."&lon=".$users[$i]['longitude']."&appid=".$apiKey."");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $curl_response = json_decode($result, true);
            $weather = $curl_response['weather'][0]; 
            $weather['user_id'] = $users[$i]['id'];
            $weather['remote_id'] = $weather['id'];
            unset($weather['id']);

            $weather = Weather::firstOrCreate($weather);
            
            
        }

        return response($status=200);
    }

    

    
}
