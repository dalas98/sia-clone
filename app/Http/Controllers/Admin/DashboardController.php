<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getChart()
    {
        $data['xValues'] = Subject::get()->pluck('name');
        $data['color'] = [];
        foreach ($data['xValues'] as $key => $value) {
            $data['color'][] = "rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
            $data['yValues'][] = rand(0,255);
        }

        return $data;
    }
}
