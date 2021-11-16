<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PollingUnit;
use App\Models\PollingUnitResult;
use App\Models\LGA;

class LgaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lgas = LGA::all();

        return Inertia::render("LGA", [
            "lgas" => $lgas,
        ]);
    }

    public function results($id)
    {
        
        $unit = PollingUnit::where(["lga_id" => $id])->first();

        $results = $unit !== null ? PollingUnitResult::where(["polling_unit_uniqueid" => $unit->uniqueid])->sum("party_score") : "";

        return $results;
    }
}
