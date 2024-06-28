<html>
<title>
    All posts
</title>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<body>

    <form method="POST" action="{{ route('post.delete.all') }}">
        @csrf
                @method('delete')
        <!-- <a class="btn btn-danger" href="{{ route('post.delete.all') }}">Delete All</a><br><br> -->
        <button type="submit" class="btn btn-danger"> Delete All </button>

    </form> <a class="btn btn-danger" href="{{ route('post.delete.all.truncate') }}" role="button">Delete All
        Truncate</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">body</th>
                <th scope="col">Pro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>

                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}" role="button">Edit</a>
                        <a class="btn btn-danger" href="{{ route('post.delete', $post->id) }}" role="button">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
