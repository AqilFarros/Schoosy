@include('layouts.session.error')
@include('layouts.session.success')

<div>
    <p>{{ $school->name }}</p>
    <a href="{{ route('school.edit', $school->slug) }}">edit</a>
    <form action="{{ route('school.destroy', $school->slug) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
</div>

<div>
    <form action="{{ route('previlage.searchPrevillage') }}" method="post">
        @csrf
        @method('POST')
        <input type="text" name="query">
        <button type="submit">search</button>
    </form>
</div>