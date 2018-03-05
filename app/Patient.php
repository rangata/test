<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'middlename',
        'lastname',
        'email',
        'phone',
        'age',
        'gender',
        'birthday',
        'mobile'
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::created(function ($model) {
        });
        self::saving(function ($model) {
//            $model->generateLoginForPatientAccess();
        });
    }

    public function loginAccess()
    {
        return $this->hasOne('App\PatientAccess');
    }

    public function fullName()
    {
        if ($this->middlename != null){
            return $this->name  . ' ' . str_limit($this->middlename, 1) . ' ' . $this->lastname;
        }
        return $this->name  . ' '  . $this->lastname;
    }

    public function calculateAgeAndSaveItIntoDb()
    {

        if ($this->attributes['birthday'] != null) {
            $calculation = floor(Carbon::parse($this->attributes['birthday'])->diffInDays(Carbon::today()) / 366);
            $updatePatient = Patient::findOrFail($this->id);
            $updatePatient->age = $calculation;
            $updatePatient->save();

            return $calculation;

        } else {
            return 'N/A!!';
        }

    }

    public function generateLoginForPatientAccess()
    {
        $patient = Patient::findOrFail($this->id);
        $patient->loginAccess->username = substr(strtoupper($patient->generateRandomString(6)),1,3) . '-' . rand(410, 65590) . '-' . rand(515, 50500);
        $patient->loginAccess->password = substr(strtoupper($patient->generateRandomString(6)),1,3) . '-' . rand(410, 65590);
        $patient->loginAccess()->save();
        return 'ok';

    }


   public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



}
