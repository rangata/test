@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('message'))
        <div class="alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<strong>Успешно обновен!</strong> Alert body ...
        </div>
    @endif
    <div class="container">

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                      <h1>{{ $patient->fullName() }}
                      </h1>
                      <span>Години: {{ $patient->calculateAgeAndSaveItIntoDb() }}</span> |
                      <span>Пол: мъж</span> |
                      <span>Дата на раждане: {{ \Carbon\Carbon::parse($patient->birthday)->format("d.m.Y") }}</span>
                  </div>
                <div class="panel-body collapse" id="panelbody">
                    <div class="col-sm-3">
                        <img src="http://static.freemake.com/blog/wp-content/uploads/2014/12/qrcode_freemake.png" alt=""
                             width="80%">
                    </div>
                    <div class="col-sm-9">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Потребителско име за достъп</th>
                                <th>Парола</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $patient->loginAccess->username ? : "nqma" }}</td>
                                <td>{{ $patient->loginAccess->password ? : "nqma" }}</td>
                                <td>
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                    data-toggle="dropdown">
                                                Dropdown
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                <li role="presentation" class="dropdown-header">Dropdown header</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a>
                                                </li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another
                                                        action</a></li>
                                                <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1"
                                                                                            href="#">Something else here</a>
                                                </li>
                                                <li role="presentation" class="divider"></li>
                                                <li role="presentation" class="dropdown-header">Dropdown header</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated
                                                        link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-danger btn-block">Генерирай нови!</a>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn bnt-primary" data-toggle="collapse" data-target="#panelbody">Още..</button>
                </div>
            </div>


        </div>
    </div>
    <h3>
        Панорамни снимки
    </h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>
                    №
                </th>
                <th>
                    Дата на изследавнето:
                </th>
                <th>
                    Тип на изследването
                </th>
            </tr>
        </thead>
        <tbody>
        {{--@foreach( as )--}}
            <tr>
                <td>
                </td>
            </tr>
        {{--@endforeach--}}
        </tbody>
    </table>
    <h3>
        Секторни снимки
    </h3>
</div>
@endsection