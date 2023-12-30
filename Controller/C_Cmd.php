<?php
include_once("../Model/Bean/Cmd.php");
include_once("../Model/BO/BO_Cmd.php");
include_once("../Model/Bean/Bot.php");
include_once("../Model/BO/BO_Bot.php");
class C_Cmd
{
    public function addCmd()
    {
        $boCmd = new BO_Cmd();
        $idbot = $_REQUEST["idbot"];
        $detail = $_REQUEST["detail"];
        $content = $_REQUEST["content"];
        $boCmd->addCmd($idbot, $detail, $content);
    }
    public function view()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $id = $_REQUEST["ID"];
            $boCmd = new BO_Cmd();
            $listCmd = $boCmd->getListCmd($id);
            include_once("../View/viewCmd.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function cmdDetail()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $idCmd = $_REQUEST["IdCmd"];
            $idBot = $_REQUEST["IdBot"];
            $boCmd = new BO_Cmd();
            $boBot = new BO_Bot();
            $cmdDetail = $boCmd->getCmdDetail($idCmd);
            $bot = $boBot->getBotDetail($idBot);
            include_once("../View/viewCmdDetail.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
}
$C_Cmd = new C_Cmd();
if (isset($_REQUEST["opt"])) {
    $option = $_REQUEST["opt"];
    if ($option == "add") {
        $C_Cmd->addCmd();
    } else if ($option == "view") {
        $C_Cmd->view();
    } else if ($option == "detail") {
        $C_Cmd->cmdDetail();
    }
}
