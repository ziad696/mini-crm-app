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
                    <li class="breadcrumb-item active">Employee</li>
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
                        <a href="{{route('employee.create')}}" type="button" class="btn btn-outline-primary btn-block ">
                            <i class="fas fa-plus-square"></i> Add
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $key => $employee)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td>
                                    <a href="{{route('employee.show', $employee->id)}}" title="Details" class="btn btn-xs btn-default text-teal mx-1 shadow">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{route('employee.destroy', $employee->id)}}" onclick="notificationBeforeDelete(event, this)" title="Delete" class="btn btn-xs btn-default text-danger mx-1 shadow">
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