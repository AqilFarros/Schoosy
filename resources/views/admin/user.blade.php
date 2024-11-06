@extends('layouts.admin.parent')

@section('content')
    <div class="card">
        <div class="card-body overflow-auto">
            <h5 class="card-title">All User</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://ui-avatars.com/api/?background=random&name={{ $item->name }}"
                                    alt="user photo">
                            </td>
                            <td>
                                <form action="{{ route('admin.user.delete', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
