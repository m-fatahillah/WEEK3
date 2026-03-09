<?php

namespace App\Http\Controllers;

use App\Models\UserModel; // Tambahkan ini
use Illuminate\Support\Facades\Hash; // Tambahkan ini
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $user = UserModel::create([
        'username' => 'manager11',
        'nama' => 'Manager11',
        'password' => Hash::make('12345'),
        'level_id' => 2,
    ]); // [cite: 408, 409]

    $user->username = 'manager12'; // [cite: 410]

    $user->save(); // [cite: 411]

    $user->wasChanged(); // true [cite: 412]
    $user->wasChanged('username'); // true [cite: 413]
    $user->wasChanged(['username', 'level_id']); // true [cite: 414]
    $user->wasChanged('nama'); // false [cite: 415]
    dd($user->wasChanged(['nama', 'username'])); // true 
}

}