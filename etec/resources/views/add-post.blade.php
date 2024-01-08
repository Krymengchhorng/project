<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post</title>
</head>
<body>
    <form action="/add-post-submit" method="post">
        @csrf
        Title<br><input type="text" name="title" id=""><br>
        Description<br><input type="text" name="description" id=""><br><br>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>