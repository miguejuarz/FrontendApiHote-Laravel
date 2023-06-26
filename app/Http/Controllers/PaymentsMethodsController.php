<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentsMethodsController extends Controller
{
    //
    public function index()
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');

        $response = Http::get($url.'/payment_methods');
        $data = $response->json();

        return view('forms.paymentsMethod.index', compact('data'));
    }
    
    public function create()
    {
        return view('forms.paymentsMethod.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::post($url.'/payment_methods',[
            'name' => $request->name,
        ]);
        return redirect()->route('payments.index');

    }

    public function show($idPayment){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url. '/payment_methods/'.$idPayment);
        $Payment = $response->json();

        return view('forms.paymentsMethod.show', compact('Payment'));
    }

    public function view($idPayment)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url. '/payment_methods/'.$idPayment);
        $payment = $response->json();

        return view('forms.paymentsMethod.view', compact('payment'));
    }
    
    public function update(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::put($url.'/payment_methods/'.$request->id,[
            'name' => $request->name,
        ]);
        return redirect()->route('payments.index');
    }
    
    public function delete($idPayment)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/payment_methods/'.$idPayment);
        return redirect()->route('payments.index');
    }
}
