<?php
include_once("../Model/Bean/Capture.php");
include_once("../Model/DAO/DAO_Capture.php");
class BO_Capture
{
    public function addCapture($idbot, $detail, $content)
    {
        $daoCapture = new DAO_Capture();
        $daoCapture->addCapture($idbot, $detail, $content);
    }
    public function getListCapture($idbot)
    {
        $daoCapture = new DAO_Capture();
        return $daoCapture->getListCapture($idbot);
    }
    public function getCaptureDetail($idCapture)
    {
        $daoCapture = new DAO_Capture();
        return $daoCapture->getCaptureDetail($idCapture);
    }
}
