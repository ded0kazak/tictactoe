<?php
session_start();
if (empty ($_SESSION)) {
    $_SESSION['xyz'] = 123;
}
else {
    echo $_SESSION;
}