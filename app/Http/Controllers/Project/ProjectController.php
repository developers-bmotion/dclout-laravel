<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function indexCreateProject(){
        return view('backend.project.submit-project');
    }
}
