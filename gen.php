<?php
if (isset($_REQUEST['id']))
{
    $str = $_REQUEST['id'];
    echo sha1($str);
}
?> 