@extends('app.admin.shared.main')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <h1 class="fs-4">
                Registrasi Karyawan Baru
            </h1>
        </div>
        <div class="col-12">
            @include('layouts.form_validation')
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="mx-2">
                    <div class="form-floating mb-3">
                        <input type="text" required class="form-control" value="{{ old('name') }}" name="name"
                            placeholder="Nama Lengkap">
                        <label for="floatingItemName">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" required class="form-control disabled" value="{{ old('email') }}"
                            name="email" placeholder="Email">
                        <label for="floatingItemType">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" required class="form-control" value="{{ old('phone_number') }}"
                            name="phone_number" placeholder="Phone Number">
                        <label for="floatingItemName">Nomor Telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="role" required class="form-select" placeholder="Role user">
                            <option value="">-- Silahkan Pilih Role User</option>
                            @forelse ($roles as $role)
                            <option value="{{ $role->id }}" @if (old('role')==$role->id) selected="selected"
                                @endif>{{ $role->name }}</option>
                            @empty
                            <option value="">No Data Found</option>
                            @endforelse
                        </select>
                        <label for="floatingRole">Role User</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="gender" required class="form-select" placeholder="Gender user">
                            <option value="">-- Silahkan Pilih Gender User</option>
                            @forelse (array_keys($genders) as $gender)
                            <option value="{{ $gender }}" @if (old('gender')==$gender) selected="selected" @endif>{{
                                $genders[$gender] }}</option>
                            @empty
                            <option value="">No Data Found</option>
                            @endforelse
                        </select>
                        <label for="floatingRole">Jenis Kelamin</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="project_id" required class="form-select" placeholder="Project user">
                            <option value="">-- Silahkan Pilih Project User</option>
                            @forelse ($projects as $project)
                            <option value="{{ $project->id }}" @if (old('project_id')==$project->id)
                                selected="selected" @endif>{{ $project->name }}</option>
                            @empty
                            <option value="">No Data Found</option>
                            @endforelse
                        </select>
                        <label for="floatingRole">Project</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" required class="form-control" name="password" placeholder="Password">
                        <label for="floatingPassword">password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" required class="form-control" name="password_confirmation"
                            placeholder="Confirmation Password">
                        <label for="floatingConfirmationPassword">Confirmation password</label>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                        <a class="btn btn-outline-success px-4" href="{{ route('admin.user.index') }}">Batal</a>
                        <button class="btn btn-success btn-tropmed px-4" type="submit">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection