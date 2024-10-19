<div>
    <p>{{ $school->name }}</p>
    <a href="{{ route('school.edit') }}">edit</a>
    <form action="{{ route('school.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
</div>