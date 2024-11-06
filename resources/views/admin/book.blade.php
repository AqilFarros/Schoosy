@extends('layouts.admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All Book</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name of Book</th>
                        <th scope="col">File</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td> <a href="{{ url('storage/book/file/', $item->file) }}">See File</a></td>
                            <td><img src="{{ url('storage/book/image/', $item->image) }}" alt=""
                                    class="img-thumbnail" width="250"></td>
                            <td>
                                <form action="{{ route('admin.book.delete', $item->id) }}" method="post" class="d-inline">
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
