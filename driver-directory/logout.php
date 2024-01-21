<?php
session_start();
session_unset();
session_destroy();

// Disable caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

echo "<script>window.location.replace('../index.php');</script>";
