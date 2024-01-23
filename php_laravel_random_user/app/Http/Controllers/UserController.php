<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    public function getUser()
{
    $response = Http::get('https://randomuser.me/api/');
    $data = $response->json();

    $username = $data['results'][0]['login']['username'];
    $photoUrl = $data['results'][0]['picture']['large'];
    $info = $data['info']['version'];

    return view('user', compact('username', 'photoUrl', 'info'));
}
}