@extends('layouts.admin.parent')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach ($school as $item)
        <div class="col-lg-4">
            <div class="card">
                <img src="{{ url('storage/school', $item->image) }}" alt="" width="380">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text"> <i class="bx bxs-envelope"></i>: {{ $item->email }} </p>
                    <p class="card-text"><i class="bx bxs-location-plus"></i>: {{ $item->address }}</p>
                    <p class="card-text"><i class="bx bxs-phone"></i>: {{ $item->phone }}</p>
                    <p class="card-text"><i class="bx bx-globe"></i>: {{ $item->website }}</p>

                    <form class="flex" action="{{ route('admin.statusSchool', $item->id) }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="text" value="approve" name="status" hidden>
                        <input type="text" value="{{ old('code') }}" name="code">
                        <button type="submit" class="btn btn-success ">
                            approve
                        </button>
                    </form>
                    <form class="mt-1" action="{{ route('admin.statusSchool', $item->id) }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="text" value="reject" name="status" hidden>
                        <button type="submit" class="btn btn-danger">
                            reject
                        </button>
                    </form>
                </div>
                    
            </div>
        </div>
        <div>


        </div>
    @endforeach
@endsection
