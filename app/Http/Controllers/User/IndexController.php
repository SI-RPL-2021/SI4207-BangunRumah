<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function getDataUser()
    {
        $user = User::all();
        return response()->json([
            'dataUser' => $user
        ], 200);
    }

    public function getUserDataByEmail(Request $request)
    {
        $user = User::where('email', $request->emailUser)->first();
        return response()->json([
            'dataUser' => $user
        ], 200);
    }

    public function  updateDataUser(Request $request)
    {
        $user = User::where('email', $request->emailBefore)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'msg' => 'Data berhasil di update!'
        ], 200);
    }
}
