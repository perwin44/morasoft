<h1>create new post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('postss.store')}}" method="post">
    @csrf
    {{-- <input type="text" name="title" required placeholder="Enter Title"><br><br> --}}

    <input id="title"
    placeholder="Enter Title"
    type="text" 
    name="title"
    value="{{old('title')}}"
    class="@error('title') is-invalid @enderror"><br><br>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    {{-- <input type="text" name="body" required placeholder="Enter Body"><br><br> --}}

    <input id="body"
    placeholder="Enter Body"
    type="text"
    name="body"
    value="{{old('body')}}"
    class="@error('body') is-invalid @enderror"><br><br>
    @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    <button type="submit">Submit</button>
</form>
