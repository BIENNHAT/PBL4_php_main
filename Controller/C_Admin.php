<?php
include_once("../Model/Bean/Admin.php");
include_once("../Model/BO/BO_Admin.php");
include_once("../Model/BO/BO_Bot.php");
class C_Admin
{

    //Nhân viên: Xem, tìm kiếm, thêm, xóa
    public function view()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            header('Location: ../View/listBot.php');
        } else {
            header("Location: ../View/login.php");
        }
    }
    public function checkLogin()
    {
        session_start();
        $boAdmin = new BO_Admin();
        $value_username =  $_REQUEST['username'];
        $value_password = $_REQUEST['password'];
        $result = $boAdmin->checkLogin($value_username, $value_password);
        if ($result == true) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $value_username;
            $boBot = new BO_Bot();
            $listBot = $boBot->getAllBot();
            $count = $boBot->getCountAllBot();
            include_once("../View/listBot.php");
        } else {
            header('Location: ../View/login.php');
        }
    }
    public function checkLogout()
    {
        session_start();
        session_unset();
        header('Location: ../View/index.php');
    }
}
$C_Admin = new C_Admin();
if (isset($_REQUEST["opt"])) {
    $option = $_REQUEST["opt"];
    if ($option == "view") {
        $C_Admin->view();
    } else if ($option == "login") {
        $C_Admin->checkLogin();
    } else if ($option == "logout") {
        $C_Admin->checkLogout();
    }
}
