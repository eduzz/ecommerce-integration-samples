<?php

namespace App\Http\Controllers;

use App\HttpClient;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClienteController extends Controller
{
    public function index()
    {
        $clients = User::all();
        return view("clientes", compact("clients"));
    }

    public function create(Request $request)
    {
        try {
            $data = $request->all();

            $profile = Profile::all()->first();

            $myEduzzUser = $data;
            HttpClient::post(["customer" => $myEduzzUser], "customer", $request->attributes->get("oauth_token"));

            $user = new User();
            $user->fill($data);
            $user->profile_id = $profile->id;
            $user->save();

            return redirect()->route("clientes.index");
        } catch (\Exception $e) {
            Cache::add("error", $e->getMessage(), 1);
            return redirect()->route("clientes.index");
        }
    }
}