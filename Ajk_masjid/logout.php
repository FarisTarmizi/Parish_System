<?php
$_SESSION['login'] = false;
session_destroy();
?>
<script>
    window.location = '../index.php';
</script>
