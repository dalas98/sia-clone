<?php

namespace App\Http\Controllers\Student;

use App\EnrollSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['subjects'] = EnrollSubject::with('subject')->where('student_id',request()->user()->id)->get();
        return view('student.dashboard', $data);
    }
}
