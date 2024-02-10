<?php
define('host', 'localhost');
define('user', 'root');
define('password', '');
define('db', 'bail_bond_ongikarnama');

// Create a connection
$conn = new mysqli(host, user, password, db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
