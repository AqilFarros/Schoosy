@include('layouts.session.error')
@include('layouts.session.success')

<div>
    @forelse ($previlage as $item)
        <div>
            <p>{{ $item->user->name }}</p>
            <p>{{ $item->role }}</p>
            @if ($item->role == 'owner')
            <option value="">owner</option>
            @else
                <form action="{{ route('previlage.updatePrevillage', [$school->slug, $item->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="role" id="">
                        <option value="student">student</option>
                        <option value="teacher">teacher</option>
                        <option value="operator">operator</option>
                    </select>

                    <button type="submit">update</button>
                </form>
            @endif

            <form action="{{ route('previlage.deletePrevillage', [$school->slug, $item->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @empty
        <p>No Member</p>
    @endforelse
</div>
