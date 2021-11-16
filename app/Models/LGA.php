<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PollingUnit;
use App\Models\PollingUnitResult;

class LGA extends Model
{
    use HasFactory;

    public $table = "lga";
    public $primaryKey = "uniqueid";

    public function results(): hasManyThrough {

        return $this->hasManyThrough(PollingUnit::class, PollingUnitResult::class, "polling_unit_uniqueid");

    }

}
