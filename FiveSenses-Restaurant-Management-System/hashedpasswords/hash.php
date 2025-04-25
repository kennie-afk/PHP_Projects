<?php

$password = 'kennedy001';  // <-- put the password you want to hash
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo "Hashed Password: " . $hashed_password;
