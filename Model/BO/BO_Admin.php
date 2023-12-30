<?php
include_once("../Model/Bean/Admin.php");
include_once("../Model/DAO/DAO_Admin.php");
class BO_Admin
{
    public function checkLogin($value_username, $value_password)
    {
        $daoAdmin = new DAO_Admin();
        return $daoAdmin->checkLogin($value_username, $value_password);
    }
}
