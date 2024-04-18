<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create()
    {
        return view('client_form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string|size:12',
            'address' => 'required|string|max:75',
            'logo' => 'required|image|max:2048',
        ]);

        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/company_logo', $filename);

        $client = new Client();
        $client->name = $validatedData['name'];
        $client->email = $validatedData['email'];
        $client->telephone = $validatedData['phone'];
        $client->address = $validatedData['address'];
        $client->company_logo = asset('storage/company_logo/' . $filename);
        $client->save();

        return redirect('/dashboard')->with('success', 'Client added successfully!');
    }
}
