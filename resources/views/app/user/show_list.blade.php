@extends('layouts.main')

@section('content')
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_names }}</td>
                    <td>{{ $user->status_type }}</td>
                    <td>
                        <a href="{{ route('user_detail.show', ['id' => $user->id]) }}" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links('vendor.pagination.default') }}
@endsection
