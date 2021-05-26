<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->token_email_verification = Str::random(13);
        $user->role_user = $request->roleUser;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json('Registrasi sukses!', 200);
    }
}
