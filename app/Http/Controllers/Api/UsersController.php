<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\PG_users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function users()
    {
        $users = PG_users::select(
            'pg_users.*'
        )
        ->get();

        // dd($users->all());
        // dd($users->pluck('user_name')->toArray());
        return response()->json($users);
    }
}
