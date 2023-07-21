<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ConsultationController extends Controller
{
    public function create(Request $request): View
    {
        return view('consultation-student');
    }
}
