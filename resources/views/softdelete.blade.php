<h1>all posts soft delete</h1>

<table>

    {{-- <th>#</th> --}}
    <th>id</th>
    <th>title</th>
    <th>body</th>
    <th>Pro</th>

    @foreach ($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>
            <a href="{{route('post.restore',$post->id)}}">Restore</a>
            <form action="{{route('post.delete',$post->id)}}" method="get">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>

    @endforeach
</table>
