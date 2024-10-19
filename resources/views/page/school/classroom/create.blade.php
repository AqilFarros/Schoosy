@include('layouts.session.error')
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
    <form action="{{ route('previlage.classroom.store', $school->slug) }}" method="post">
        @csrf
        @method('POST')
        <label for="">name</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <label for="">image</label>
        <input type="file" name="image">

        <button type="submit">create</button>
    </form>
</div>