<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomersController extends Controller
{
    //
    public function index()
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');

        $response = Http::get($url.'/customers');
        $data = $response->json();

        return view('forms.customer.index', compact('data'));
    }

    public function create()
    {
        return view('forms.customer.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::post($url.'/customers',[
            'customer_name' => $request->customer_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);
        return redirect()->route('customers.index');

    }

    public function show($idCustomer){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url. '/customers/'.$idCustomer);
        $customer = $response->json();

        return view('forms.customer.show', compact('customer'));
    }

    public function view($idCustomer){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url. '/customers/'.$idCustomer);
        $customer = $response->json();

        return view('forms.customer.view', compact('customer'));
    }

    public function update(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::put($url.'/customers/'.$request->id,[
            'customer_name' => $request->customer_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('customers.index');
    }
    
    public function delete($idCustomer)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/customers/'.$idCustomer);
        return redirect()->route('customers.index');
    }
}
