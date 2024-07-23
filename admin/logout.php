<!---
CRIADO: JORGE ASSUNÇÃO NETO
DATA:20/07/2024
-->

<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:index.php');

?>