
<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Add task
if (isset($_POST['add_task'])) {
    $task = trim($_POST['task']);

    if (!empty($task)) {
        $_SESSION['tasks'][] = $task;
    }
}

// Delete task
if (isset($_GET['delete'])) {
    $index = (int) $_GET['delete'];

    if (isset($_SESSION['tasks'][$index])) {
        unset($_SESSION['tasks'][$index]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP To-Do List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            padding: 50px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        input {
            width: 70%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        li {
            padding: 12px;
            margin-top: 10px;
            background: #f1f5f9;
            list-style: none;
            display: flex;
            justify-content: space-between;
        }

        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>My To-Do List</h1>

    <form method="POST">
        <input type="text" name="task" placeholder="Enter a new task" required>
        <button type="submit" name="add_task">Add</button>
    </form>

    <h3>My Tasks</h3>

    <ul>
        <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
            <li>
                <?= htmlspecialchars($task) ?>
                <a href="?delete=<?= $index ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

</div>

</body>
</html>
