<?php
include_once("../Model/Bean/Cookies.php");
include_once("../Model/DAO/DAO_Cookies.php");
class BO_Cookies
{
    public function addCookies($idbot, $detail, $content)
    {
        $daoCookies = new DAO_Cookies();
        $daoCookies->addCookies($idbot, $detail, $content);
    }
    public function getListCookies($idbot)
    {
        $daoCookies = new DAO_Cookies();
        return $daoCookies->getListCookies($idbot);
    }
    public function getCookiesDetail($idCookies)
    {
        $daoCookies = new DAO_Cookies();
        return $daoCookies->getCookiesDetail($idCookies);
    }
}
