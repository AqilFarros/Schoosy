@include('layouts.session.error')
@include('layouts.session.success')

<div>
    <p>school: {{ $school->name }}</p>
    <p>class: {{ $classroom->name }}</p>
</div>