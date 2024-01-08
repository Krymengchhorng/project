<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove post</title>
</head>
<body>
    <form action="/remove-post-submit" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$post}}"><br>
        <p>Are you sure to remove!</p><br>
        <input type="submit" value="yes">
        <a href="/post">No</a>
    </form>
    
</body>
</html>