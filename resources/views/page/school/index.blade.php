<div>
    <p>{{ $school->name }}</p>
    <a href="{{ route('school.edit', $school->slug) }}">edit</a>
    <form action="{{ route('school.destroy', $school->slug) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
</div>