@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Sunting Karyawan
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingItemName" name="name"
                            placeholder="Nama Lengkap" value="{{ $user->name }}">
                        <label for="floatingItemName">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control disabled" id="floatingItemType" placeholder="Username">
                        <label for="floatingItemType">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control disabled" id="floatingItemType" placeholder="Email"
                            value="{{ $user->email }}">
                        <label for="floatingItemType">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="role" name="role" required class="form-select" placeholder="Role user">
                            <option value="">-- Silahkan Pilih Role User</option>
                            @forelse ($roles as $role)
                            <option {{ $user->roles->first()->id == $role->id ? 'selected' : '' }} value="{{ $role->id
                                }}">{{ $role->name }}</option>
                            @empty
                            <option value="">No Data Found</option>
                            @endforelse
                        </select>
                        <label for="floatingProject">Project</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password" value="">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password_confirmation"
                            id="floatingConfirmationPassword" placeholder="Password" value="">
                        <label for="floatingConfirmationPassword">Confirmation Password</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" type="button"
                            href="{{ route('admin.user.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Perbarui</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection