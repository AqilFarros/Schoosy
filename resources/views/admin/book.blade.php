@extends('layouts.admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ALL book</h5>
            <table class="table">
                <thead></thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name Of book</th>
                    <th scope="col">File</th>
                    <th scope="col">image</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($book as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>  <a href="{{ url('storage/book/file/', $item->file) }}">See File</a></td>
                            <td><img src="{{ url('storage/book/image/', $item->image) }}" alt="" class="img-thumbnail"
                                    width="250"></td>
                            <td>
                                <form action="#" method="post" class="d-inline">
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
