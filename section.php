<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Nav Bar</title>
    <style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #333;
            height: 100%;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 20px;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #444;
        }

        /* Content styles */
        .content {
            margin-left: 250px;
        }

        iframe {
            width: 100%;
            height: 100vh; /* Use the full viewport height */
            border: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="graphs.php" target="contentFrame">Dashboard</a>
        <a href="addfaculty.php" target="contentFrame">Add Faculty</a>
        <a href="manfac.php" target="contentFrame">Manage Faculty</a>
        <a href="studentlist.php" target="contentFrame">Manage Students</a>
        <a href="viewfeedbacks.php" target="contentFrame">Feedbacks</a>
        <a href="home.php" >Logout</a>
    </div>

    <div class="content">
        <iframe name="contentFrame" frameborder="0" src="cards.php"></iframe>
    </div>
</body>
</html>
