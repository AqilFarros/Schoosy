@extends('layouts.parent')

@section('content')
    <form action="{{ route('previlage.searchPrevillage', $school->slug) }}" method="GET">
        <input type="text" name="query">
        <button type="submit">search</button>
    </form>

    <div>
        @foreach ($school->previllage as $item)
            <div class="flex gap-x-4">
                <p>{{ $item->name }}</p>
                @if ($item->role == 'owner')
                    <p>{{ $item->role }}</p>
                @else
                    @if ($previlage->role == 'owner' || $previlage->role == 'operator')
                        <form action="{{ route('previlage.updatePrevillage', [$school->slug, $item->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role" id="">
                                @if ($item->role == 'student')
                                    <option value="student" selected>student</option>
                                @else
                                    <option value="student">student</option>
                                @endif

                                @if ($item->role == 'teacher')
                                    <option value="teacher" selected>teacher</option>
                                @else
                                    <option value="teacher">teacher</option>
                                @endif

                                @if ($item->role == 'operator')
                                    <option value="operator" selected>operator</option>
                                @else
                                    <option value="operator">operator</option>
                                @endif
                            </select>

                            <button type="submit">update</button>
                        </form>
                    @else
                        <p>{{ $item->role }}</p>
                    @endif
                @endif
            </div>
        @endforeach
    </div>
@endsection
