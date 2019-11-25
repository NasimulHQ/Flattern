<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function getAllUser()
    {
        $users = User::all();

        return response()->json([
            'users'=>$users
        ], 200)
            ->header('x-users-count', count($users))
            ->header('Api-version', 'Version 1.0.0')
            ->header('Api-developed-by', 'Nasimul Haq');
    }
}
