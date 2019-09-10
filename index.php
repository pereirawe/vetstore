<?php
    include './functions.php';
    if (isset($_SESSION["user_email"])) {
        echo '<script>
        window.location.href = "https://vetstore.com.co/welcome.php"
    </script>';
    } else {
        echo '<script>
        window.location.href = "https://vetstore.com.co/register.php"
    </script>';
    };
?>