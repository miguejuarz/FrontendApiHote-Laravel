<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HotelsController extends Controller
{
    //
    public function index()
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener todos los datos de la tabla 'hotel'
    $response = Http::get($url.'/hotels');
    $hotelsData = $response->json();

    // Obtener los detalles del ciudad asociado al hotel
    foreach ($hotelsData as &$hotelData) {
        if (isset($hotelData['city_id'])) {
            $cityId = $hotelData['city_id'];
            $response = Http::get($url."/cities/{$cityId}");
            $cityData = $response->json();

            // Verificar si se obtuvieron los datos del city correctamente
            if (!empty($cityData)) {
                $hotelData['city'] = $cityData;
            } else {
                $hotelData['city'] = null; // O asigna un valor por defecto
            }
        } else {
            $hotelData['city'] = null; // O asigna un valor por defecto
        }
    } 

    return view('forms.hotel.index', compact('hotelsData'));
}

public function create()
{
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener todos los datos de la tabla 'cities'
    $response = Http::get($url.'/cities');
    $citiesData = $response->json();

    return view('forms.hotel.create', compact('citiesData'));

}

public function store(Request $request)
{
    $url = env('URL_SERVER_API','http://127.0.0.1');
    $response = Http::post($url.'/hotels',[
        'name_hotel' => $request->name_hotel,
        'address' => $request->address,
        'city_id' => $request->city_id,
        'phone_number' => $request->phone_number,
        'email' => $request->email
    ]);

    return redirect()->route('hotels.index');
}

    public function show($idHotel)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos de la ciudad con el ID correspondiente
    $response = Http::get($url."/hotels/{$idHotel}");
    $hotelData = $response->json();

    // Obtener los detalles del país asociado a la ciudad
    $cityId = $hotelData['city_id'];
    $response = Http::get($url."/cities/{$cityId}");
    $cityData = $response->json();

    // Verificar si se obtuvieron los datos del país correctamente
    if (!empty($cityData)) {
        $hotelData['city'] = $cityData;
    } else {
        $hotelData['city'] = null; // O asigna un valor por defecto
    }


    return view('forms.hotel.show', compact('hotelData'));
    }

public function view($idHotel)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos del hotel con el ID correspondiente
    $response = Http::get($url."/hotels/{$idHotel}");
    $hotelData = $response->json();

    // Obtener los detalles del ciudad a la que pertenece el hotel
    $cityId = $hotelData['city_id'];
    $response = Http::get($url."/cities/{$cityId}");
    $cityData = $response->json();

    // Verificar si se obtuvieron los datos del país correctamente
    if (!empty($cityData)) {
        $hotelData['city'] = $cityData;
    } else {
        $hotelData['city'] = null; // O asigna un valor por defecto
    }

       // Obtener todos los datos de la tabla 'citys'
       $response = Http::get($url.'/cities');
       $citiesData = $response->json();
   

    return view('forms.hotel.view', compact('hotelData', 'citiesData'));
    }

    public function update(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::put($url.'/hotels/'.$request->id,[
            'name_hotel' => $request->name_hotel,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);
        
        return redirect()->route('hotels.index');
    }

    public function delete($idHotel)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/hotels/'.$idHotel);
        return redirect()->route('hotels.index');
    }
}
