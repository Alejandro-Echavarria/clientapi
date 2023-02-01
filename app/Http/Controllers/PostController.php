<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function store()
    {
        $this->resolveAuthorization();

        $response =  Http::withHeaders([

            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . auth()->user()->accessToken->access_token,
        ])->post('http://api.test/v1/posts', [

            'name'        => 'test',
            'slug'        => 'test',
            'extract'     => 'test',
            'body'        => 'test',
            'category_id' => 1,
        ]);

        return $response->json();
    }
}
