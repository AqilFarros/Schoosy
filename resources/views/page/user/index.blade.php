<div class="relative">
    @if (empty(Auth::user()->image))
        <img src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}" alt="img"
            class="hidden md:block rounded-full ring-4 ring-slate-200" style="height: 16em; width: 16em;">
    @else
        <img src="{{ url('storage/profile/', $user->image) }}" alt="img"
            class="hidden md:block rounded-full ring-4 ring-slate-200" style="height: 16em; width: 16em;">
    @endif
    <div class="absolute bottom-3 right-5 flex justify-center items-center px-2 py-1 bg-slate-200 rounded-full">
        <form action="{{ route('user.update', $user->id) }}" method="post" id="uploadForm"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="userImage"><i class="fa-solid fa-camera-retro text-xl cursor-pointer"></i>upload</label>
            <input type="file" name="image" id="userImage" onchange="uploadImage()" hidden>
        </form>
    </div>
</div>

<script>
    function uploadImage() {
        document.getElementById('uploadForm').submit();
    }
</script>
