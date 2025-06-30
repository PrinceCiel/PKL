@extends('layouts.backend')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/backend/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary">
                    Data Users
                    <a href="{{ route('backend.product.create') }}" class="btn btn-info btn-sm" style="float: right;">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table" id="dataCategory">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $data)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $data->name}}</td>
                                    <td>{{ $data->email}}</td>
                                    <td>{{ Str::limit($data->password, 20)}}</td>
                                    <td>
                                        <a href="{{ route('backend.user.show', $data->id) }}" class="btn btn-sm btn-success">
                                            Show
                                        </a> |
                                        @if($data->isAdmin == 0)
                                        <a href="{{ route('backend.user.destroy', $data->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">
                                            Delete
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="{{ asset('assets/backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/backend/js/datatable/datatable-basic.init.js') }}"></script>
  <script>
    new DataTable('#dataUsers')
  </script>
@endpush