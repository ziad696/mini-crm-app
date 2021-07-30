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
                    <li class="breadcrumb-item active">{{ __('adminlte::menu.employees') }}</li>
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
                            <i class="fas fa-plus-square"></i> {{ __('adminlte::adminlte.add') }}
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>{{ __('adminlte::adminlte.name') }}</th>
                            <th>E-mail</th>
                            <th>{{ __('adminlte::adminlte.phone') }}</th>
                            <th>{{ __('adminlte::adminlte.company') }}</th>
                            <th>{{ __('adminlte::adminlte.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
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
        $(function () {
            var table = $('#example2').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees') }}",
                columns: [
                    {
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'company_name', name: 'company_name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[ 0, "desc" ]]
            });
        });
    </script>
@stop