@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        Detail User
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for=""><strong>Nama : </strong></label>
                                <div>{{ $user->name }}</div>
                            </div>
                            <div class="mb-3">
                                <label for=""><strong>Email : </strong></label>
                                <div>{{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for=""><strong>Password : </strong></label>
                                <div>{{ $user->password }}</div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('backend.user.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection