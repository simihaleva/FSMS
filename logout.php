<?php
session_start();
session_destroy();
header('Location: beginning.html');
?>