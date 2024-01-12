<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
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
    public function prescription()
    {
        return $this->belongsTo(Prescription::class,'prescription_id','id');
    }
    
}
