<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="/register-submit" method="post">
        @csrf
        name:<br>
        <input type="text" name="name" id=""><br>
        email:<br>
        <input type="email" name="email" id=""><br>
        password:<br>
        <input type="password" name="password" id=""><br><br>
        <input type="submit" value="Register">

    </form>
    
</body>
</html>