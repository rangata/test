<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientAccess extends Model
{
    //
    protected $fillable = [
        'patient_id',
        'username',
        'password',
        'lastLogin',
        'ipAddress'
        ];

    public function patients()
    {
        return $this->belongsTo('App\Patient');
    }
}
