<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create() {
        return view('/client_form');
    }

    public function send(Request $request) : RedirectResponse {
        $validate = $request->validate([
            'name' => 'string|required',
            'email' => 'string|email|required',
            'phone' => 'string|required|size:12',
            'address' => 'string|max:75|required|',
            'logo' => 'required|file|image|max:2048'
        ]);

        $file = $request->file('logo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('company_logo', $filename, 'public');

        $client = new Client();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->telephone = $request->input('phone');
        $client->address = $request->input('address');
        $client->company_logo = asset('storage/' . $path);
        $client->save();

        return redirect('/dashboard')->with('success', 'Task was successful!');
    }
}
