<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getDataDesigner()
    {
        $data = User::where('role_user', 'Designer')->get();
        return response()->json(
            [
                'dataDesigner' => $data
            ],
            200
        );
    }

    public function getDataDesignerByCity(Request $request)
    {
        if ($request->city === null) {
            $data = User::where('role_user', 'Designer')->get();
        } else {
            $data = User::where('address', $request->city)
                ->where('role_user', 'Designer')
                ->get();
        }
        return response()->json(
            [
                'dataDesigner' => $data
            ],
            200
        );
    }
}
