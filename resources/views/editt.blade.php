<h1>edit post</h1>


<form action="{{route('postss.update',$post->id)}}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="title" value="{{$post->title}}"><br><br>
    <input type="text" name="body" value="{{$post->body}}"><br><br>
    <button type="submit">Update</button>
</form>
