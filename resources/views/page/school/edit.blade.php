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

<form action="{{ route('school.update', $school->slug) }}" method="post">
    @csrf
    @method('PUT')

    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $school->name }}">
    </div>

    <div>
        <label for="">Email</label>
        <input type="text" name="email" value="{{ $school->email }}">
    </div>

    <div>
        <label for="">phone</label>
        <input type="text" name="phone" value="{{ $school->phone }}">
    </div>

    <div>
        <label for="">website</label>
        <input type="text" name="website" value="{{ $school->website }}">
    </div>

    <div>
        <label for="">address</label>
        <input type="text" name="address" value="{{ $school->address }}">
    </div>

    <button type="submit">submit</button>
</form>