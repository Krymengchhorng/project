<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list post</title>
</head>
<body>
    <table border="1px" width="700px">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>Actions</th>
        </tr>
        @foreach ($objPost as $i)
        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->title}}</td>
            <td width="250px">{{$i->description}}</td>
            <td>
                <a href="/post-detail/{{$i->id}}">View</a>
                <a href="/update-post/{{$i->id}}">Edit</a>
                <a href="/remove-post/{{$i->id}}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>