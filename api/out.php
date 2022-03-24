<?php
header('Content-Type: application/json; charset=utf-8');
$device = "PDM0001";
$out = new stdClass();
if ((isset($_REQUEST['device_id'])) and (isset($_REQUEST['secret'])))
{
    $dev_id = $_REQUEST['device_id'];
    $secret = $_REQUEST['secret'];
    if (($dev_id == $device) and ($secret == sha1($device)))
    {
        $out->relay[1] = 1;
        $out->relay[2] = 1;
        $out->digital['3.3v'][1] = 1;
        $out->digital['3.3v'][2] = 1;
        $out->digital['5v'][1] = 255;
        $out->digital['5v'][2] = 255;
        $out->digital['12v'][1] = 1;
        $out->digital['12v'][2] = 1;
        $out->digital['24v'][1] = 1;
        $out->digital['24v'][2] = 1;    
    }
    else 
    {
        $out->messages = "Not Authorized!";
        $out->dev_id = $dev_id;
        $out->secret = $secret;
    }
}
else
{
    $out->messages = "Rejected!";
}

echo json_encode($out);

?> 