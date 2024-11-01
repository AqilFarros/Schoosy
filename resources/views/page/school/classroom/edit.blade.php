{{-- @include('layouts.session.error')
@include('layouts.session.success')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <p>school: {{ $school->name }}</p>
    <form action="{{ route('previlage.classroom.store', [$school->slug, $classroom->slug]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="">name</label>
        <input type="text" name="name" value="{{ $classroom->name }}">

        <button type="submit">update</button>
    </form>
</div> --}}