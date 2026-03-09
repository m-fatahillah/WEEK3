<?php

namespace App\Http\Controllers;

use App\Models\UserModel; // Tambahkan ini
use Illuminate\Support\Facades\Hash; // Tambahkan ini
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $user = UserModel::firstOrNew(
        [
            'username' => 'manager34',
            'nama' => 'Manager Tiga Tiga',
            'password' => Hash::make('12345'),
            'level_id' => 2
        ],
    );
    
    $user->save(); // Menyimpan data ke database

    return view('user', ['data' => $user]);
}

}