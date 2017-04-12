<?php
//username bengkok db bengkok
$db = new mysqli("localhost", "bengkok", "", "bengkok");
if ($db->connect_errno) {
    die("Connection failed: " . $db->connect_error);
}
?>
