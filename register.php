<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="handleRegister.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <br>
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" />
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" />
        <label for="female">Female</label>
        <br>
        <br>
        <input type="submit" name="submit" value="Register">
    </form>

</body>

</html>