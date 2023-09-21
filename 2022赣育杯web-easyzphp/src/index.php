<?php
include 'pop.php'; // Next step in pop.php
if (preg_match('/pop\.php\/*$/i', $_SERVER['PHP_SELF']))
{
    exit("no way!");
}
if (isset($_GET['source']))
{
    $path = basename($_SERVER['PHP_SELF']);
    if (!preg_match('/pop.php$/', $path) && !preg_match('/index.php$/', $path))
    {
        exit("nonono!");
    }
    highlight_file($path);
    exit();
}
?>
<a href="index.php?source">Source</a>
