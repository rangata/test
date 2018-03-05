<?php

namespace App\Http\Controllers;

use App\Events\CreateNewPatientEvent;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $patient = new Patient();
        $patient->fill($request->all());
//        $patient->generateLoginForPatientAccess();
        $patient->save();
        $pl = $patient->loginAccess()->create([
            'patient_id' => $patient->id,
            'username' => substr(strtoupper($patient->generateRandomString(6)),1,3) . '-' . rand(410, 65590) . '-' . rand(515, 50500),
            'password' => substr(strtoupper($patient->generateRandomString(6)),1,3) . '-' . rand(410, 65590),
            'lastLogin' => Carbon::today(),
            'ipAddress' => $request->getClientIp()
        ]);
        $pl->save();


        return redirect()->to('patients/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
        $photos = ['https://images.pexels.com/photos/46710/pexels-photo-46710.jpeg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb',
            'https://media.istockphoto.com/photos/turkish-couple-in-cafe-taking-selfie-picture-id522469037',
            'https://media.istockphoto.com/photos/turkish-couple-in-cafe-taking-selfie-picture-id522469037',
            'https://media.istockphoto.com/photos/turkish-couple-in-cafe-taking-selfie-picture-id522469037'
        ];
        return view('patients.show', compact('patient', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());

        return redirect()->to('patients/' . $patient->id)->with(['message' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
