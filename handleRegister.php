<?php

if (isset($_POST["submit"])) {
    //catch
    $username = trim(htmlspecialchars($_POST["username"]));
    $password = trim(htmlspecialchars($_POST["password"]));
    // $password = hash('sha256', $password);
    // $password = password_hash($password, PASSWORD_DEFAULT);
    $email = trim(htmlspecialchars($_POST["email"]));
    $age = trim(htmlspecialchars($_POST["age"]));
    $gender = trim(htmlspecialchars($_POST["gender"]));

    //validation
    $errors = [];
    $gender_arr = ["male", "female"];
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
        //insert into database
        print_r($_POST);
    } else {
        echo json_encode($errors); //return errors
    }
} else {
    header("location:register.php");
};
