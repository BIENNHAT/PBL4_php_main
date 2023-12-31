<?php
include_once("../Model/Bean/Cmd.php");
class DAO_Cmd
{
    public function addCmd($idbot, $detail, $content)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $query = "INSERT INTO cmd(IdBot,Cmd,CmdResult) VALUES(?,?,?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sss', $idbot, $detail, $content);
        $stmt->execute();
        $db->close();
    }

    public function getListCmd($idbot,$page)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from cmd where IdBot = " . $idbot . " ORDER BY Time DESC";
        $offset = $page * 15;
        $sql = $sql . " LIMIT 15 OFFSET " . $offset;
        $rs = mysqli_query($link, $sql);
        $listCmd = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $IdCmd = $row['IdCmd'];
            $IdBot = $row['IdBot'];
            $Time = $row['Time'];
            $Cmd = $row['Cmd'];
            $CmdResult = $row['CmdResult'];
            $listCmd[$i++] = new Cmd($IdCmd, $IdBot, $Time, $Cmd, $CmdResult);
        }
        return $listCmd;
    }
    public function getCountListCmd($idbot)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from cmd where IdBot = " . $idbot . " ORDER BY Time DESC";
        $count = 0;
        $rs = mysqli_query($link, $sql);
        $listCmd = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $count++;
        }
        return $count;
    }
    public function getCmdDetail($idCmd)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from cmd where IdCmd = " . $idCmd ;
        $rs = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $IdCmd = $row['IdCmd'];
            $IdBot = $row['IdBot'];
            $Time = $row['Time'];
            $Cmd = $row['Cmd'];
            $CmdResult = $row['CmdResult'];
            return new Cmd($IdCmd, $IdBot, $Time, $Cmd, $CmdResult);
        }
    }
}
