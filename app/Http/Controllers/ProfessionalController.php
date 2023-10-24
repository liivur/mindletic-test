<?php

namespace App\Http\Controllers;

use App\Models\Professional;

class ProfessionalController extends Controller
{
    // For displaying professionals to choose for consultation
    public function index()
    {
        return Professional::all();
    }
}
