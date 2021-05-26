<?php

namespace App\Http\Controllers\Architect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function getDataArchitect()
    {
        $data = User::where('role_user', 'Architect')->get();
        return response()->json(
            [
                'dataArchitect' => $data
            ],
            200
        );
    }

    public function getDataArchitectByCity(Request $request)
    {
        if ($request->city === null) {
            $data = User::where('role_user', 'Architect')->get();
        } else {
            $data = User::where('address', $request->city)
                ->where('role_user', 'Architect')
                ->get();
        }
        return response()->json(
            [
                'dataArchitect' => $data
            ],
            200
        );
    }
}
