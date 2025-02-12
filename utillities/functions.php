<?php
// Function to sanitize input
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Function to validate username (Only letters and spaces, min 3 chars)
function validate_username($username)
{
  $username = test_input($username);
  if (empty($username)) {
    return "Username is required.<br>";
  } elseif (!preg_match("/^[a-zA-Z ]{3,}$/", $username)) {
    return "Invalid username (Only letters, min 3 chars).<br>";
  }
  return true;
}

// Function to validate email
function validate_email($email)
{
  $email = test_input($email);
  if (empty($email)) {
    return "Email is required.<br>";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "Invalid email format.<br>";
  }
  return true;
}

// Function to validate phone number (Only numbers, 10 digits)
function validate_phone($phone)
{
  $phone = test_input($phone);
  if (empty($phone)) {
    return "Phone number is required.<br>";
  } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
    return "Invalid phone number (Must be 10 digits).<br>";
  }
  return true;
}

// Function to validate password (Min 8 chars, 1 letter, 1 number)
function validate_password($password)
{
  $password = test_input($password);
  if (empty($password)) {
    return "Password is required.<br>";
  } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
    return "Password must be at least 8 chars with 1 letter & 1 number.<br>";
  }
  return true;
}
?>