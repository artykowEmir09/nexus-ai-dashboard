<?php

session_start();

require_once "db.php";

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;

}

if ($_SESSION["user_role"] !== "admin") {

    die("Access denied.");

}

$stmt = $pdo->query(
    "SELECT id, name, email, role, created_at
     FROM users
     ORDER BY id DESC"
);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$countStmt = $pdo->query(
    "SELECT COUNT(*) FROM users"
);

$totalUsers = $countStmt->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>NEXUS AI - Admin</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

    <div class="logo">
        NEXUS<span>AI</span>
    </div>

    <div class="nav-links">

        <span>
            ADMIN:
            <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
        </span>

        <a href="logout.php">
            Logout
        </a>

    </div>

</nav>


<section class="admin-page">

    <p class="status">
        ● ADMIN CONTROL CENTER
    </p>

    <h1>
        System
        <span>Administration</span>
    </h1>


    <div class="admin-stat">

        <div class="card">

            <h3>TOTAL USERS</h3>

            <strong>
                <?php echo $totalUsers; ?>
            </strong>

        </div>

    </div>


    <div class="users-table">

        <h2>Registered Users</h2>

        <table>

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($users as $user): ?>

                    <tr>

                        <td>
                            <?php echo $user["id"]; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($user["name"]); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($user["email"]); ?>
                        </td>

                        <td>
                            <?php echo $user["role"]; ?>
                        </td>

                        <td>
                            <?php echo $user["created_at"]; ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</section>

</body>
</html>

