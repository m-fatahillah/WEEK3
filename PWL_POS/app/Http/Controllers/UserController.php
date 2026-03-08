<?php

namespace App\Http\Controllers;

use App\Models\UserModel; // Tambahkan ini
use Illuminate\Support\Facades\Hash; // Tambahkan ini
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345') // Perbaikan: hapus spasi setelah ::
        ];

        UserModel::create($data);
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}