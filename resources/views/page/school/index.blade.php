<div>
    <p>{{ $school->name }}</p>
    <a href="{{ route('school.edit', $school->id) }}">edit</a>
    <form action="{{ route('school.destroy', $school->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
</div>