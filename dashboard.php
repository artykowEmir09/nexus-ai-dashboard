
<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>NEXUS AI Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

    <div class="logo">
        NEXUS<span>AI</span>
    </div>

    <div class="nav-links">

        <span>
            Welcome,
            <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
        </span>

        <a href="logout.php">
            Logout
        </a>

    </div>

</nav>

<section class="dashboard-page">

    <p class="status">
        ● USER ONLINE
    </p>

    <h1>
        Welcome to your
        <span>NEXUS DASHBOARD</span>
    </h1>

    <p>
        Your account is successfully connected
        to the NEXUS AI system.
    </p>

    <div class="dashboard-info">

        <div class="card">

            <h3>USER</h3>

            <strong>
                <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
            </strong>

        </div>

        <div class="card">

            <h3>ACCOUNT TYPE</h3>

            <strong>
                USER
            </strong>

        </div>

        <div class="card">

            <h3>SYSTEM</h3>

            <strong class="online">
                ONLINE
            </strong>

        </div>

    </div>

</section>

<script src="script.js"></script>

</body>
</html>
