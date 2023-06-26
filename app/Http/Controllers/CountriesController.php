<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountriesController extends Controller
{
    // 
    public function index()
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');

        $response = Http::get($url.'/countries');
        $data = $response->json();

        return view('forms.country.index', compact('data'));
    }

    public function create()
    {
        return view('forms.country.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API','http://127.0.0.1');
        $response = Http::post($url.'/countries',[
            'name_country' => $request->name_country,
        ]);
        return redirect()->route('countries.index');

    }
    
    public function show($idCountry){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url. '/countries/'.$idCountry);
        $country = $response->json();

        return view('forms.country.show', compact('country'));
    }

    public function view($idCountry)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url. '/countries/'.$idCountry);
        $country = $response->json();

        return view('forms.country.view', compact('country'));
    }

    public function update(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::put($url.'/countries/'.$request->id,[
            'name_country' => $request->name_country,
        ]);
        return redirect()->route('countries.index');
    }

    public function delete($idCountry)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url.'/countries/'.$idCountry);
        return redirect()->route('countries.index');
    }
}
