@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('school.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        <label for="">Email</label>
        <input type="text" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <label for="">phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}">
    </div>

    <div>
        <label for="">website</label>
        <input type="text" name="website" value="{{ old('website') }}">
    </div>

    <div>
        <label for="">address</label>
        <input type="text" name="address" value="{{ old('address') }}">
    </div>

    <div>
        <label for="">image</label>
        <input type="file" name="image">
    </div>

    <button type="submit">submit</button>
</form>