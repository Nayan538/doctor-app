<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    public function drugs()
    {
        return $this->belongsTo(Drug::class,'drugs_id','id');
    }
}
