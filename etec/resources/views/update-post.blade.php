<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update post</title>
</head>
<body>
    <form action="/update-post-submit" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$post[0]->id}}">
        Title<br><input type="text" name="title" id="" value="{{$post[0]->title}}"><br>
        Description<br>
        <textarea  name="description" cols="30" rows="10" id="">{{$post[0]->description}}</textarea><br><br>
        <input type="submit" value="update">
    </form>
    
</body>
</html>