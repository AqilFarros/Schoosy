@extends('layouts.admin.parent')

@section('content')
    <div class="card">
        <div class="card-body overflow-auto">
            <h5 class="card-title">All Video</h5>
            <table class="table">
                <thead></thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name of Video</th>
                    <th scope="col">Video</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($video as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{!! $item->getVideoAttributes($item->url_youtube) !!}</td>
                            <td>
                                <form action="{{ route('admin.video.delete', $item->id) }}" method="post" class="d-inline">
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
