<?php

namespace App\Http\Controllers\ProjectProgress;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\ProjectProgres;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function createProgress(Request $request)
    {
        $project = new ProjectProgres();
        $project->id_project = $request->idProject;
        $project->keterangan = $request->keterangan;
        $project->persentase = $request->persentase;
        $project->save();

        return response()->json([
            'msg' => 'Progress berhasil di simpan!'
        ], 200);
    }

    public function finishProject(Request $request)
    {
        $project = Orders::find($request->idProject);
        $project->finished = 'Y';
        $project->save();

        return response()->json([
            'msg' => 'Project finished!'
        ], 200);
    }

    public function getProgress(Request $request)
    {
        $progress = ProjectProgres::where('id_project', $request->idProject)->get();
        return response()->json([
            'dataProgress' => $progress
        ], 200);
    }
}
