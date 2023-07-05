<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
    
        // Obtener todos los datos de la tabla 'pays'
        $response = Http::get($url.'/pays');
        $paysData = $response->json();
    
        // Obtener los detalles de los metodos de pago asociado al pago
        foreach ($paysData as &$payData) {
            if (isset($payData['method_id'])) {
                $methodId = $payData['method_id'];
                $response = Http::get($url."/payment_methods/{$methodId}");
                $payMethodData = $response->json();
    
                // Verificar si se obtuvieron los datos del payment_method correctamente
                if (!empty($payMethodData)) {
                    $payData['pay_method'] = $payMethodData;
                } else {
                    $payData['pay_method'] = null; // O asigna un valor por defecto
                }
            } else {
                $payData['pay_method'] = null; // O asigna un valor por defecto
            }
        } 
        

        return view('forms.pay.index', compact('paysData'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');

        // Obtener todos los datos de la tabla 'cities'
        $response = Http::get($url.'/payment_methods');
        $paymentData = $response->json();

        $response = Http::get($url.'/reservations');
        $reservationData = $response->json();

        return view('forms.pay.create', compact('paymentData', 'reservationData'));

    }

    public function store(Request $request)
    {
    $url = env('URL_SERVER_API','http://127.0.0.1');
    $response = Http::post($url.'/pays',[
        'reservation_id' => $request->reservation_id,
        'method_id' => $request->method_id,
        'amountPayable' => $request->amount,
        'date' => $request->date,
        'state' => $request->state
    ]);

    return redirect()->route('pays.index');
    }

    public function show($idPay)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos del pay con el ID correspondiente
    $response = Http::get($url."/pays/{$idPay}");
    $payData = $response->json();


    // Obtener los detalles del payment_method asociado a Pay
    $methodId = $payData['method_id'];
    $response = Http::get($url."/payment_methods/{$methodId}");
    $methodData = $response->json();

    // Verificar si se obtuvieron los datos del payment_method correctamente
    if (!empty($methodData)) {
        $payData['method'] = $methodData;
    } else {
        $payData['method'] = null; // O asigna un valor por defecto
    }


    return view('forms.pay.show', compact('payData'));
    }

    public function view($idPay)
    {
    $url = env('URL_SERVER_API', 'http://127.0.0.1');

    // Obtener los datos de pay con el ID correspondiente
    $response = Http::get($url."/pays/{$idPay}");

    //validacion para que por si hay error en la respuesta
    if (!$response->successful()) {
        return redirect()->route('pays.index');
    }
    $payData = $response->json();
    if (empty($payData)) {
        return redirect()->route('pays.index');
    }

    // Obtener los detalles del payment_method asociado a Pay
    $methodId = $payData['method_id'];
    $response = Http::get($url."/payment_methods/{$methodId}");
    $methodData = $response->json();

    // Verificar si se obtuvieron los datos del payment_method correctamente
    if (!empty($methodData)) {
        $payData['method'] = $methodData;
    } else {
        $payData['method'] = null; // O asigna un valor por defecto
    }

      // Obtener todos los datos de la tabla 'payment methods'
      $response = Http::get($url.'/payment_methods');
      $methodsData = $response->json();

    return view('forms.pay.view', compact('payData', 'methodsData'));
    }

    
    public function update(Request $request)
    {
    $url = env('URL_SERVER_API','http://127.0.0.1');
    $response = Http::put($url.'/pays/'.$request->id,[
        'reservation_id' => $request->reservation_id,
        'method_id' => $request->method_id,
        'amountPayable' => $request->amountPayable,
        'date' => $request->date,
        'state' => $request->state
    ]);

    if ($response->successful()) {
        // Procesa la respuesta de la API
        return redirect()->route('pays.index');
    } else {
        // Maneja el error de la solicitud
        dd($response);
    }

    
    }

    public function delete($idPay)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/pays/'.$idPay);
        return redirect()->route('pays.index');
    }

}
