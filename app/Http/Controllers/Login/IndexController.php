<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $checkPass = Hash::check($request->password, $user->password);
            if ($checkPass) {
                return response()->json([
                    'msg' => 'Selamat datang '.$user->name.'!',
                    'dataUser' => $user,
                    'status' => 200
                ], 200);
            } else {
                return response()->json([
                    'msg' => 'Password anda tidak sesuai, harap cek kembali!',
                    'status' => 400
                ], 200);
            }
        } else {
            return response()->json([
                'msg' => 'Email anda tidak ada di data kami, harap cek kembali!',
                'status' => 400
            ], 200);
        }
    }
}
