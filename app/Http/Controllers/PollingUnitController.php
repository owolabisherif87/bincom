<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PollingUnit;

class PollingUnitController extends Controller
{
    
    public function index()
    {

        return Inertia::render("PollingUnit", [
            "units" => PollingUnit::get(),
        ]);
    }

    public function findAll() {
        $units = PollingUnit::all();

        return $units;
    }
}
