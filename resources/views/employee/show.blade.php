@extends('adminlte::page')

@section('title', 'Employee')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('adminlte::menu.employees') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item"><a href="{{route('employees')}}">{{ __('adminlte::menu.employees') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('adminlte::adminlte.show') }}</li>
                </ol>
            </div>
        </div>
      </div>
@stop

@section('content')
    <form action="{{route('employee.update', $employee->id)}}" method="post">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i> Form
                        </h3>
                    </div>
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <img class="img-fluid pad" src="{{url('images/employee.jpg')}}" alt="Employees">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="first_name">*{{ __('adminlte::adminlte.name') }}</label>
                                    <input type="text" id="first_name" placeholder="{{ __('adminlte::adminlte.first_name') }}" name="first_name" value="{{$employee->first_name}}" class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-6">
                                    <label for="name">&nbsp;</label>
                                    <input type="text" id="last_name" placeholder="{{ __('adminlte::adminlte.last_name') }}" name="last_name" value="{{$employee->last_name}}" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="text" id="email" placeholder="E-mail" name="email" value="{{$employee->email}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">{{ __('adminlte::adminlte.phone') }}</label>
                                <input type="text" id="phone" placeholder="{{ __('adminlte::adminlte.phone') }}" name="phone" value="{{$employee->phone}}" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="company_id">*{{ __('adminlte::adminlte.company') }}</label>
                                <select id="company_id" name="company_id" class="custom-select @error('company_id') is-invalid @enderror">
                                    <option value="">..{{ __('adminlte::adminlte.choose_one') }}..</option>
                                    
                                    @foreach($companies as $company_name => $company_id)
                                        <option value="{{$company_id}}"
                                        @if ($employee->company_id == $company_id)
                                            selected="selected"
                                        @endif
                                        >{{$company_name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        console.log('Hi!'); 
    </script>
@stop