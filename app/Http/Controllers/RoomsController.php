<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RoomsController extends Controller
{
    //
    public function index()
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener todos los datos de la tabla 'rooms'
    $response = Http::get($url.'/rooms');
    $roomsData = $response->json();

    // Obtener los detalles de hotels asociado al rooms
    foreach ($roomsData as &$roomData) {
        if (isset($roomData['hotel_id'])) {
            $hotelId = $roomData['hotel_id'];
            $response = Http::get($url."/hotels/{$hotelId}");
            $hotelData = $response->json();

            // Verificar si se obtuvieron los datos del city correctamente
            if (!empty($hotelData)) {
                $roomData['hotel'] = $hotelData;
            } else {
                $roomData['hotel'] = null; // O asigna un valor por defecto
            }
        } else {
            $roomData['hotel'] = null; // O asigna un valor por defecto
        }
    } 

    return view('forms.room.index', compact('roomsData'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener todos los datos de la tabla 'hotels'
        $response = Http::get($url.'/hotels');
        $hotelsData = $response->json();

        return view('forms.room.create', compact('hotelsData'));

    }

    
    public function store(Request $request)
    {
    $disponibilidad = $request->has('availability') ? 'disponible' : 'no disponible';

    $url = env('URL_SERVER_API','http://127.0.0.1');
    $response = Http::post($url.'/rooms',[
        'hotel_id' => $request->hotel_id,
        'type_room' => $request->type_room,
        'night_price' => $request->night_price,
        'capacity' => $request->capacity,
        'description_room' => $request->description_room,
        'aviable' => $disponibilidad
    ]);


    return redirect()->route('rooms.index');
    }

    public function show($idRoom)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos de la ciudad con el ID correspondiente
    $response = Http::get($url."/rooms/{$idRoom}");
    $roomData = $response->json();

    // Obtener los detalles del room asociado al hotel
    $hotelId = $roomData['hotel_id'];
    $response = Http::get($url."/hotels/{$hotelId}");
    $hotelData = $response->json();

    // Verificar si se obtuvieron los datos del hotel correctamente
    if (!empty($hotelData)) {
        $roomData['hotel'] = $hotelData;
    } else {
        $roomData['hotel'] = null; // O asigna un valor por defecto
    }


    return view('forms.room.show', compact('roomData'));
    }

    public function view($idRoom)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos del room con el ID correspondiente
    $response = Http::get($url."/rooms/{$idRoom}");
    $roomData = $response->json();

    // Obtener los detalles del ciudad a la que pertenece el hotel
    $hotelId = $roomData['hotel_id'];
    $response = Http::get($url."/hotels/{$hotelId}");
    $hotelData = $response->json();

    // Verificar si se obtuvieron los datos del país correctamente
    if (!empty($hotelData)) {
        $roomData['hotel'] = $hotelData;
    } else {
        $roomData['hotel'] = null; // O asigna un valor por defecto
    }

       // Obtener todos los datos de la tabla 'citys'
       $response = Http::get($url.'/hotels');
       $hotelsData = $response->json();
   

    return view('forms.room.view', compact('roomData', 'hotelsData'));
    }

    public function update(Request $request)
    {
    $disponibilidad = $request->has('availability') ? 'disponible' : 'no disponible';

    $url = env('URL_SERVER_API','http://127.0.0.1');
    $response = Http::put($url.'/rooms/'.$request->id,[
        'hotel_id' => $request->hotel_id,
        'type_room' => $request->type_room,
        'night_price' => $request->night_price,
        'capacity' => $request->capacity,
        'description_room' => $request->description_room,
        'aviable' => $disponibilidad
    ]);

    return redirect()->route('rooms.index');
    }

    public function delete($idRoom)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/rooms/'.$idRoom);
        return redirect()->route('rooms.index');
    }
}
