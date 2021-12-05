<?php

namespace App\Http\Controllers\Admin;

use App\EnrollSubject;
use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getChart()
    {
        $data = [];
        $subject = EnrollSubject::select('subject_id', DB::raw('count(*) as total'))->with('subject')->groupBy('subject_id')->get();
        foreach ($subject as $value) {
            $data['color'][] = "rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
            $data['xValues'][] = $value->subject->name;
            $data['yValues'][] = $value->total;
        }
        
        return $data;
    }
}
