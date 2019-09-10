<script>
    sessionStorage.clear();
    window.localStorage.clear();
</script>

<?php
    include './functions.php';

    if (isset($_SESSION['user_id'])) {
        log_create("logout", "", $_SESSION['user_id']);
    }
    
	$_SESSION['pin'] = false;
    unset($pin);
    if (isset($_SESSION['facebook_access_token'])) {
        unset($_SESSION['facebook_access_token']);
    }
    if (isset($_SESSION['userData'])) {
        unset($_SESSION['userData']);
    }
    if (isset($_SESSION)) {
        unset($_SESSION);
    }
    session_destroy();
    
    // Redireccionar a página de inicio
    header("Location: ./register.php");
    echo '<script>window.location.replace("./");</script>';
    exit();

    

	die();
?>