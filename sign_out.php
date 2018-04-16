<?php

// initialize a session

session_start();

// then destroy it

session_destroy();
header("Location: index.php");
?>
