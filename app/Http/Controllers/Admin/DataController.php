<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function getAllUserdata()
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'phone', 'created_at', 'updated_at']);

        return Datatables::of($users)->make(true);
    }
}
