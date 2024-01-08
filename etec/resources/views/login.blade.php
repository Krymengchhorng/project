<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="/login-submit" method="post">
        @csrf
        name or email:<br>
        <input type="text" name="name_email" id=""><br>
        password:<br>
        <input type="password" name="password" id=""><br><br>
        <input type="submit" value="Login">

    </form>
    
</body>
</html>