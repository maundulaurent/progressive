<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect to login page
header('Location: /projects/quotations/pages/login');
exit();
