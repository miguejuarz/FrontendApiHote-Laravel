<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CitiesController extends Controller
{
    //
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener todos los datos de la tabla 'cities'
        $response = Http::get($url.'/cities');
        $citiesData = $response->json();
    
        // Obtener los detalles del país asociado a cada ciudad
        foreach ($citiesData as &$cityData) {
            $countryId = $cityData['country_id'];
            $response = Http::get($url."/countries/{$countryId}");
            $countryData = $response->json();
    
            // Verificar si se obtuvieron los datos del país correctamente
            if (!empty($countryData)) {
                $cityData['country'] = $countryData;
            } else {
                $cityData['country'] = null; // O asigna un valor por defecto
            }
        }
        return view('forms.cities.index', compact('citiesData'));
    }
    
    public function create()
    {

        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener todos los datos de la tabla 'countries'
        $response = Http::get($url.'/countries');
        $countriesData = $response->json();
    
        return view('forms.cities.create', compact('countriesData'));

    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::post($url.'/cities',[
            'name_city' => $request->name_city,
            'country_id' => $request->country_id,
        ]);
        return redirect()->route('cities.index');

    }

    public function show($idCity)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos de la ciudad con el ID correspondiente
    $response = Http::get($url."/cities/{$idCity}");
    $cityData = $response->json();

    // Obtener los detalles del país asociado a la ciudad
    $countryId = $cityData['country_id'];
    $response = Http::get($url."/countries/{$countryId}");
    $countryData = $response->json();

    // Verificar si se obtuvieron los datos del país correctamente
    if (!empty($countryData)) {
        $cityData['country'] = $countryData;
    } else {
        $cityData['country'] = null; // O asigna un valor por defecto
    }

    return view('forms.cities.show', compact('cityData'));
    }

    public function view($idCity)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos de la ciudad con el ID correspondiente
    $response = Http::get($url."/cities/{$idCity}");
    $cityData = $response->json();

    // Obtener los detalles del país asociado a la ciudad
    $countryId = $cityData['country_id'];
    $response = Http::get($url."/countries/{$countryId}");
    $countryData = $response->json();

    // Verificar si se obtuvieron los datos del país correctamente
    if (!empty($countryData)) {
        $cityData['country'] = $countryData;
    } else {
        $cityData['country'] = null; // O asigna un valor por defecto
    }

    // Obtener todos los datos de la tabla 'countries'
    $response = Http::get($url.'/countries');
    $countriesData = $response->json();

    return view('forms.cities.view', compact('cityData', 'countriesData'));
    }

    public function update(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::put($url.'/cities/'.$request->id,[
            'name_city' => $request->name_city,
            'country_id' => $request->country_id,
        ]);
        
        return redirect()->route('cities.index');
    }

    public function delete($idCity)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/cities/'.$idCity);
        return redirect()->route('cities.index');
    }
}
