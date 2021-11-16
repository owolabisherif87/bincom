<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PollingUnitResult;

class PollingUnit extends Model
{
    use HasFactory;

    public $table = "polling_unit";
    public $primaryKey = "uniqueid";

    public function results() {
        return $this->hasMany(PollingUnitResult::class, "polling_unit_uniqueid");
    }
}
