<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PollingUnitResult;
use App\Models\PollingUnit;
use Carbon\Carbon;


class PollingUnitResultController extends Controller
{
   
    public function findAll($polling_unit_uniqueid)
    {
        $unit = PollingUnit::find($polling_unit_uniqueid)->only("polling_unit_name");
        $results = PollingUnitResult::where(["polling_unit_uniqueid" => $polling_unit_uniqueid])->get();

        return Inertia::render("PollingUnitResult", [
            "results" => $results,
            "unit" => $unit,
        ]);
    }


    public function create() {
        return Inertia::render("AddResults");
    }

    public function store(Request $request) {

        $data = [
            "polling_unit_uniqueid" => $request->unitId,
            "party_abbreviation" => $request->party_abbreviation,
            "party_score" => $request->party_score,
            "entered_by_user" => $request->user,
            "date_entered" => Carbon::now(),
            "user_ip_address" => $request->ip()
        ];

        
        $result = PollingUnitResult::create($data);

        return $result;
    }
}
