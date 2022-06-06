<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
   public function index()
    {
        $data = Student::latest()->get();
        return response()->json([StudentResource::collection($data), 'Programs fetched.']);
    }
}
