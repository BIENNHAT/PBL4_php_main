<?php
include_once("../Model/Bean/Capture.php");
class DAO_Capture
{
    public function addCapture($idbot, $detail, $content)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $currentDateTime = new DateTime();
        $currentDateTimeStr = $currentDateTime->format('Y-m-d H:i:s');
        $query = "INSERT INTO capture (IdBot, CaptureResult) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $idbot, $content);
        $stmt->execute();
        $db->close();
    }
    public function getListCapture($idbot)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from capture where IdBot = " . $idbot . " ORDER BY Time DESC";
        $rs = mysqli_query($link, $sql);
        $listCapture = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $IdCapture = $row['IdCapture'];
            $IdBot = $row['IdBot'];
            $Time = $row['Time'];
            $CaptureResult = $row['CaptureResult'];
            $listCapture[$i++] = new Capture($IdCapture, $IdBot, $Time, $CaptureResult);
        }
        return $listCapture;
    }
    public function getCaptureDetail($idCapture)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "select * from capture where IdCapture = " . $idCapture;
        $rs = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $IdCapture = $row['IdCapture'];
            $IdBot = $row['IdBot'];
            $Time = $row['Time'];
            $CaptureResult = $row['CaptureResult'];
            return new Capture($IdCapture, $IdBot, $Time, $CaptureResult);
        }
    }
}
