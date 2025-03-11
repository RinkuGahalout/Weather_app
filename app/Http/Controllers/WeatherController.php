<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{ 
    public function index(Request $request)
    {
        $city = $request->input('city', 'mathura');
        $apiKey = env('OPENWEATHER_API_KEY');

        if (!$apiKey) {
            return view('weather')->withErrors(['error' => 'API key is missing!']);
        }
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
        $response = Http::get($url);

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Failed to fetch weather data.']);
        }
        $weather = $response->json();

        return view('weather', compact('weather', 'city'));
    }
}
