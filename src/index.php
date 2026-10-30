<?php
$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Database connection failed. Check your database credentials.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['complete_id'])) {
        $id = (int) $_POST['complete_id'];

        $stmt = $pdo->prepare(
            "UPDATE tasks SET is_completed = 1 WHERE id = ?"
        );
        $stmt->execute([$id]);

    } else {
        $task = trim($_POST['task'] ?? '');

        if ($task !== '') {
            $stmt = $pdo->prepare(
                "INSERT INTO tasks (title) VALUES (?)"
            );
            $stmt->execute([$task]);
        }
    }

    header('Location: index.php');
    exit;
}

$stmt = $pdo->query(
    "SELECT id, title, is_completed FROM tasks ORDER BY id DESC"
);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Task Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>My Task Manager</h1>

    <form method="POST">
        <label for="task">New task:</label>
        <input type="text" id="task" name="task"
               placeholder="Enter a task" required>
        <button type="submit">Add Task</button>
    </form>

    <h2>My Tasks</h2>

    <ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8') ?>

            <?php if ((int)$task['is_completed'] === 1): ?>
                <strong> — Completed ✓</strong>
            <?php else: ?>
                <form method="POST" style="display:inline;">
                    <input
                        type="hidden"
                        name="complete_id"
                        value="<?= (int)$task['id'] ?>"
                    >
                    <button type="submit">Mark complete</button>
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>