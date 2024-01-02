<?php




function checkSocket()
{
    $host = '192.168.1.101';
    $port = 9668;
    $timeout = 1;
    $socket = @fsockopen($host, $port, $errno, $errstr, $timeout);
    if ($socket) {

        fclose($socket);
        $_SESSION['serverStatus'] = "online";

    } else {
        $_SESSION['serverStatus'] = "offline";
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $sql = "UPDATE bot SET Status = 0";
        $rs = mysqli_query($db, $sql);
    }
}
?>