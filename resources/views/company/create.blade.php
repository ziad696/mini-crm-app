@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('adminlte::menu.companies') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item"><a href="{{route('companies')}}">{{ __('adminlte::menu.companies') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('adminlte::adminlte.add') }}</li>
                </ol>
            </div>
        </div>
      </div>
@stop

@section('content')
    <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
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
                                <img class="img-fluid pad" src="{{asset('images/company_building.jpg')}}" alt="Company Logo">
                                
                                <div class="form-group text-left">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id="logo" name="logo" class="custom-file-input @error('logo') is-invalid @enderror">
                                            <label class="custom-file-label" for="logo">Logo (JPG/PNG 100 x 100)</label>
                                        </div>
                                    </div>
                                    @error('logo') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <label for="name">*{{ __('adminlte::adminlte.name') }}</label>
                                <input type="text" id="name" placeholder="{{ __('adminlte::adminlte.company_name') }}" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="text" id="email" placeholder="{{ __('adminlte::adminlte.company_email') }}" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" id="website" placeholder="{{ __('adminlte::adminlte.company_website') }}" name="website" value="{{old('website')}}" class="form-control @error('website') is-invalid @enderror">
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
    <script src="{{url('vendor/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script> 
        $(() => {bsCustomFileInput.init();})
    </script>
@stop