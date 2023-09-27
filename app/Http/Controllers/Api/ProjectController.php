<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->paginate(10);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'results' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::where('id', $id)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Not found'
            ]);
        }
    }
}
