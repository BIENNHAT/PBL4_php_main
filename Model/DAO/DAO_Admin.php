<?php
include_once("../Model/Bean/Admin.php");
class DAO_Admin
{
    public function checkLogin($value_username, $value_password)  {
        $field_username = "Username";
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
        mysqli_select_db($connection, "pbl4_v2");
        $sql = "SELECT * FROM admin WHERE "  . $field_username .  " = '"  . $value_username .  "'";
        $rs = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($rs)) {
            if ($row['Password'] == $value_password) {
                return true;
            }
        }
        return false;
    }
    // public function getAllStaff()
    // {
    //     $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MYSQL");
    //     mysqli_select_db($link, "dulieu");
    //     $sql = "SELECT * FROM nhanvien";
    //     $rs = mysqli_query($link, $sql);
    //     $i = 0;
    //     $Staffs = array();
    //     while ($row = mysqli_fetch_array($rs)) {
    //         $idStaff = $row['IDNV'];
    //         $name = $row['Hoten'];
    //         $idDep = $row['IDPB'];
    //         $address = $row['Diachi'];
    //         $Staffs[$i++] = new Entity_Staff($idStaff, $name, $idDep, $address);    // Chưa khai báo mảng Staffs      
    //     }
    //     return $Staffs;
    // }
    // public function getStaffDetail($idStaff)
    // {
    //     $allStaff = $this->getAllStaff();
    //     foreach ($allStaff as $index => $staff) {
    //         if ($staff->idStaff == $idStaff) {
    //             return $staff;
    //         }
    //     }
    //     //return $allStaff[$stid];
    // }
    // public function addStaff($idStaff, $name, $idDep, $address)
    // {
    //     $server_name = "localhost";
    //     $username = "root";
    //     $password = "";
    //     $connection = mysqli_connect($server_name, $username, $password) or die("Khong the ket noi den co so du lieu");
    //     mysqli_select_db($connection, "dulieu");
    //     $sql = "SELECT * FROM nhanvien where IDNV = '" . $idStaff . "'";
    //     $rs = mysqli_query($connection, $sql);
    //     while ($row = mysqli_fetch_array($rs)) {
    //         if ($row['IDNV'] == $idStaff) {
    //             return false;
    //         }
    //     }
    //     $sql_insert = " INSERT INTO nhanvien VALUES ('" . $idStaff . "', '" . $name . "', '" . $idDep . "', '" . $address . "');";
    //     $connection->query($sql_insert);
    //     return true;
    // }
    // public function deleteStaff($idStaff)
    // {
    //     $server_name = "localhost";
    //     $user_name = "root";
    //     $password = "";
    //     $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
    //     mysqli_select_db($connection, "dulieu");
    //     $sql_delete = 'DELETE FROM nhanvien
    //                     WHERE IDNV = "' . $idStaff . '";';
    //     $connection->query($sql_delete);
    // }
    // public function deleteAllStaff()
    // {
    //     $server_name = "localhost";
    //     $user_name = "root";
    //     $password = "";
    //     $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
    //     mysqli_select_db($connection, "dulieu");
    //     $sql_delete = 'DELETE FROM nhanvien;';
    //     $connection->query($sql_delete);
    // }
    // public function searchStaff($attr, $infor)
    // {
    //     $server_name = "localhost";
    //     $user_name = "root";
    //     $password = "";
    //     $connection = mysqli_connect($server_name, $user_name, $password) or die("Khong the ket noi den co so du lieu");
    //     mysqli_select_db($connection, "dulieu");
    //     $sql = "SELECT * FROM nhanvien WHERE " . $attr . " LIKE '%" . $infor . "%';";
    //     $i = 0;
    //     $Staffs = array();
    //     $rs = mysqli_query($connection, $sql);
    //     while ($row = mysqli_fetch_array($rs)) {
    //         $idStaff = $row['IDNV'];
    //         $name = $row['Hoten'];
    //         $idDep = $row['IDPB'];
    //         $address = $row['Diachi'];
    //         $Staffs[$i++] = new Entity_Staff($idStaff, $name, $idDep, $address);
    //     }
    //     return $Staffs;
    // }
}
