<?php
session_start();

if (isset($_POST["submit"])) {
    $username = trim(htmlspecialchars($_POST["username"]));
    $password = trim(htmlspecialchars($_POST["password"]));
    // $password = hash('sha256', $password);
    // $password = password_hash($password, PASSWORD_DEFAULT);
    $email = trim(htmlspecialchars($_POST["email"]));
    $age = trim(htmlspecialchars($_POST["age"]));
    $gender = trim(htmlspecialchars($_POST["gender"]));

    $image = $_FILES["file"];
    $file_name =  $image["name"];
    $file_tmp =  $image["tmp_name"];
    $file_size =  $image["size"];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_ext = strtolower($file_ext);
    $allowed = array("jpg", "jpeg", "png", "gif");
    $gender_arr = ["male", "female"];
    $errors = [];

    if (!in_array($file_ext, $allowed)) {
        $errors[] = "Error: Only JPG, JPEG, PNG & GIF files are allowed.";
        exit();
    };
    if ($file_size > 2097152) {
        $errors[] = "Error: File size cannot exceed 2MB.";
        exit();
    };
    $file_destination = 'uploads/' . uniqid('', true) . '.' . $file_ext;
    //validation
    if (empty($username) || empty($password) || empty($email) || empty($age) || empty($gender)) {
        $errors[] = "Please fill in all fields";
    } elseif (!is_string($username)) {
        $errors[] = "Username must be a string";
    } elseif (strlen($username) < 2) {
        $errors[] = "Username must be at least 2 characters long";
    } elseif (strlen($username) > 50) {
        $errors[] = "Username must be less than 50 characters long";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } elseif (!is_numeric($age)) {
        $errors[] = "Age must be a number";
    } elseif (!preg_match("/^[0-9]*$/", $age)) {
        $errors[] = "Age can only contain numbers";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $gender)) {
        $errors[] = "Gender can only contain letters";
    } elseif (!in_array($gender, $gender_arr)) {
        $errors[] = "Gender have to be male or female";
    } elseif (!is_string($password)) {
        $errors[] = "Password must be a string";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    } elseif (strlen($password) > 20) {
        $errors[] = "Password must be less than 20 characters long";
    }
    // end validation
    if (empty($errors)) {
        $upload = move_uploaded_file($file_tmp, $file_destination);
        if (!$upload) {
            $errors[] = "Error: File upload failed.";
            exit();
        };
        echo "Register & File uploaded successfully.";
    } else {
        setcookie("username", $username, time() + 60 * 60 * 24 * 14);
        setcookie("email", $email, time() + 60 * 60 * 24 * 14);
        setcookie("age", $age, time() + 60 * 60 * 24 * 14);
        $_SESSION["errors"] = $errors;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["age"] = $age;
        header("location:register.php");
    }
} else {
    header("location:register.php");
};
