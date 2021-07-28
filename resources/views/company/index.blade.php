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
                    <li class="breadcrumb-item active">Company</li>
                </ol>
            </div>
        </div>
      </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{route('company.create')}}" type="button" class="btn btn-outline-primary btn-block ">
                            <i class="fas fa-plus-square"></i> Add
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Logo</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $key => $company)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <!-- <img class="img-fluid pad" src="{{$company->logo}}" alt="Company Logo">     -->
                                </td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td>
                                    <a href="{{route('company.show', $company->id)}}" title="Details" class="btn btn-xs btn-default text-teal mx-1 shadow">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{route('company.destroy', $company->id)}}" onclick="notificationBeforeDelete(event, this)" title="Delete" class="btn btn-xs btn-default text-danger mx-1 shadow">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        console.log('Hi!'); 
    </script>
@stop