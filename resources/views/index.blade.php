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
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <textarea name="body"></textarea>

    <br>
    <button type="submit">Save</button>

    <br>@error('body') <span style="color: red;">{{ $message }}</span> @enderror
</form>

<div style="margin-top: 10px;">
    <table>
        <tr>
            <th>#</th>
            <th>Body</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        @forelse($posts as $k => $post)
            <tr>
                <td>{{ ++$k }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td>
                    <div style="display: flex;">
                        <form action="{{ route('posts.edit', $post->id) }}">
                            <button>Edit</button>
                        </form>
                        <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
        @endforelse
    </table>
</div>
</body>
</html>
