<form action="{{ route('school.update') }}" method="post">
    @csrf
    @method('PUT')

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

    <button type="submit">submit</button>
</form>