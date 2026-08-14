<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research</title>
    <link rel="stylesheet" href="style.css">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        frame {
            border: none;
        }
    </style>
</head>

<frameset cols="230px,*" frameborder="0" border="0">

    <frame src="pages/sidebar.php"
        noresize
        scrolling="no"
        style="border-right:1px solid rgb(233,233,233);">

        <frameset rows="65px,*" frameborder="0" border="0">

            <frame src="pages/navbar.php"
                noresize
                scrolling="no">

                <frame src="pages/dashboard.php"
                    name="content"
                    scrolling="auto">

        </frameset>

</frameset>

<script>
    console.log("INDEX RUNNING");

    setInterval(function() {
        console.log("Refreshing dashboard...");
        if (frames["content"]) {
            frames["content"].location.reload();
        }
    }, 3000);
</script>

</html>