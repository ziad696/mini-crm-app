@extends('adminlte::page')

@section('title', 'Employee')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employee</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item"><a href="{{route('employees')}}">Employee</a></li>
                    <li class="breadcrumb-item active">Show</li>
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
                            <i class="fas fa-edit"></i> update Form
                        </h3>
                    </div>
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <img class="img-fluid pad" src="{{url('images/employee.jpg')}}" alt="Employees">
                                <p class="lead">123 Testing Ave, Testtown, 9876 NA<br>
                                    Phone: +1 234 56789012
                                </p>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="first_name">Name *</label>
                                    <input type="text" id="first_name" placeholder="Nama Depan" name="first_name" value="{{$employee->first_name}}" class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="col-6">
                                    <label for="name">&nbsp;</label>
                                    <input type="text" id="last_name" placeholder="Nama Belakang" name="last_name" value="{{$employee->last_name}}" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="text" id="email" placeholder="E-mail" name="email" value="{{$employee->email}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" placeholder="No. Telepon/Hp" name="phone" value="{{$employee->phone}}" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select id="company_id" name="company_id" class="custom-select @error('company_id') is-invalid @enderror">
                                    <option value="">..Pilih salah satu perusahaan..</option>
                                    
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