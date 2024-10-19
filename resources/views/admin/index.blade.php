@foreach ($school as $item)
    <div>
        <img src="{{ url('storage/school', $item->image) }}" alt="" width="300">
        <form action="{{ route('admin.statusSchool', $item->id) }}" method="post">
            @csrf
            @method('POST')
            <input type="text" value="reject" name="status" hidden>
            <button type="submit">
                reject
            </button>
        </form>
        <form action="{{ route('admin.statusSchool', $item->id) }}" method="post">
            @csrf
            @method('POST')
            <input type="text" value="approve" name="status" hidden>
            <button type="submit">
                approve
            </button>
        </form>
    </div>
@endforeach