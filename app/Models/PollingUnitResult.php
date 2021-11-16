<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PollingUnit;


class PollingUnitResult extends Model
{
    use HasFactory;

    public $table = "announced_pu_results";
    public $timestamps = false;


    protected $guarded = [];

}
