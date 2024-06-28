<h1>all posts</h1>

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
            <a href="{{route('postss.edit',$post->id)}}">Edit</a>
            <form action="{{route('postss.destroy',$post->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">SoftDelete</button>
            </form>
        </td>
    </tr>

    @endforeach
</table>
