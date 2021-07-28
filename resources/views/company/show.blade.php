@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Company</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item"><a href="{{route('companies')}}">Company</a></li>
                    <li class="breadcrumb-item active">Show</li>
                </ol>
            </div>
        </div>
      </div>
@stop

@section('content')
    <form action="{{route('company.update', $company->id)}}" method="post">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i> Update Form
                        </h3>
                    </div>
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <img class="img-fluid pad" src="{{url('images/company.jpg')}}" alt="Company Logo">
                                <p class="lead">123 Testing Ave, Testtown, 9876 NA<br>
                                    Phone: +1 234 56789012
                                </p>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <label for="name">*Name</label>
                                <input type="text" id="name" placeholder="Nama Perusahaan" name="name" value="{{$company->name}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="text" id="email" placeholder="E-mail Perusahaan" name="email" value="{{$company->email}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" id="website" placeholder="Website Perusahaan" name="website" value="{{$company->website}}" class="form-control @error('website') is-invalid @enderror">
                                @error('website') <span class="text-danger">{{$message}}</span> @enderror
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