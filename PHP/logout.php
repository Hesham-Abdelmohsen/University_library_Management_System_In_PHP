<?php

require_once 'session.php';

session_destroy();

header('location: ../main_page/index.html');

?>
