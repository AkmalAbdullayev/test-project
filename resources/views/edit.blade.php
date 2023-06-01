<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment</title>
</head>
<body>
<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')
    <textarea name="body">{{ $post->body }}</textarea>

    <br>
    <button type="submit">Save</button>
</form>
</body>
</html>
