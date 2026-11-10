<?php
$pw="ExamplePassword123";
$hashPw=hash('sha256', $pw);
echo '<h2>'.$hashPw.'</h2>';
$salt=microtime();
$pw="ExamplePassword124";
$hashPw=hash('sha256', $pw.$salt);
echo '<h2>'.$hashPw.'</h2>';
?>