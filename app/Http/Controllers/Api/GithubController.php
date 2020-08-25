<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GithubController extends Controller
{
    public function index()
    {
        return view('github.users.list');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $res = Http::get(config('app.github_api_url') . '/search/users',[
            'q' => $keyword
        ]);
        $users = json_decode($res->body())->items;
        return view('github.users.list', compact('users'));
    }
}
