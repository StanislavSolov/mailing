<?php

$conn = new mysqli('localhost', 'root', '', 'Mailing');

if ($conn->connect_error) {
    die('Connection to DB failed' . $conn->connect_error);
}