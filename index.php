
<?php
// PHP code
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);

    $message = "Welcome, " . $name . "! Your email is " . $email;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Website</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        .container {
            background: white;
            padding: 30px;
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            padding: 10px 25px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Welcome to PHP</h1>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Enter your name" required>

        <input type="email" name="email" placeholder="Enter your email" required>

        <button type="submit">Submit</button>
    </form>

    <p><?php echo $message; ?></p>
</div>

</body>
</html>
