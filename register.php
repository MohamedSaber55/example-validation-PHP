<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"] {
            width: auto;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <?php
    session_start();
    if(!empty($_SESSION["errors"])){
        foreach($_SESSION["errors"] as $error){
            echo "<p style='color: red'>" . $error . "</p>";
        }
        // echo "<p style='color: red'>" . implode("<br>", $_SESSION["errors"]) . "</p>";

    };
    ?>
    <form action="handleRegister.php" method="post" id="registerForm" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"
            <!-- value="<?= isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '' ?>"> -->
            value="<?= isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '' ?>">
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
            value="<?= isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : '' ?>">
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age"
            value="<?= isset($_COOKIE['age']) ? htmlspecialchars($_COOKIE['age']) : '' ?>">
        <br>

        <label for="file">File:</label>
        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .gif" required>
        <br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male"
            <?= (isset($_COOKIE['gender']) && $_COOKIE['gender'] === 'male') ? 'checked' : '' ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female"
            <?= (isset($_COOKIE['gender']) && $_COOKIE['gender'] === 'female') ? 'checked' : '' ?>>
        <label for="female">Female</label>
        <br>

        <input type="submit" name="submit" value="Register">
    </form>


</body>

</html>