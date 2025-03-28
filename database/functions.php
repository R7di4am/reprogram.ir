<?php
include("./db.php");
function generate_key($length = 16)
{
    return bin2hex(random_bytes($length));
}
function sanitizeInput($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

function displaySafeOutput($input) {
    return htmlspecialchars_decode($input, ENT_QUOTES);
}
