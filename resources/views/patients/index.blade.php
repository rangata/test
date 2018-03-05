@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Пациенти
    </h1>
    <table class="table table-striped table-hover" id="patientTable">
        <thead>
            <tr>
                <th>
                №
                </th>
                <th>name</th>
                <th>middlename</th>
                <th>lastname</th>
                <th>email</th>
                <th>phone</th>
                <th>mobile</th>
            </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>
                {{ $loop->iteration }}
                </td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->middlename }}</td>
                <td>{{ $patient->lastname }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->mobile }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-xs btn-primary">Виж</a>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-xs btn-primary">Виж</a>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-xs btn-primary">Виж</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection