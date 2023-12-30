<?php
include_once("../Model/Bean/Capture.php");
include_once("../Model/BO/BO_Capture.php");
include_once("../Model/Bean/Bot.php");
include_once("../Model/BO/BO_Bot.php");
class C_Capture
{
    public function addCapture()
    {
        $boCapture = new BO_Capture();
        $idbot = $_REQUEST["idbot"];
        $detail = $_REQUEST["detail"];
        $content = $_REQUEST["content"];
        $boCapture->addCapture($idbot, $detail, $content);
    }
    public function view()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $id = $_REQUEST["ID"];
            $boCapture = new BO_Capture();
            $listCapture = $boCapture->getListCapture($id);
            include_once("../View/viewCapture.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
    public function CaptureDetail()
    {
        session_start();
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $idCapture = $_REQUEST["IdCapture"];
            //$idBot = $_REQUEST["IdBot"];
            $boCapture = new BO_Capture();
            //$boBot = new BO_Bot();
            $CaptureDetail = $boCapture->getCaptureDetail($idCapture);
            //$bot = $boBot->getBotDetail($idBot);
            include_once("../View/viewCaptureDetail.php");
        } else {
            include_once('../View/noLogin.php');
        }
    }
}
$C_Capture = new C_Capture();
if (isset($_REQUEST["opt"])) {
    $option = $_REQUEST["opt"];
    if ($option == "add") {
        $C_Capture->addCapture();
    } else if ($option == "view") {
        $C_Capture->view();
    } else if ($option == "detail") {
        $C_Capture->captureDetail();
    }
}
