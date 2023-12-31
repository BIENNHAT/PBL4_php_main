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
    public function getListCapture($idbot,$page)
    {
        $daoCapture = new DAO_Capture();
        return $daoCapture->getListCapture($idbot,$page);
    }
    public function getCountListCapture($idbot)
    {
        $daoCapture = new DAO_Capture();
        return $daoCapture->getCountListCapture($idbot);
    }
    public function getCaptureDetail($idCapture)
    {
        $daoCapture = new DAO_Capture();
        return $daoCapture->getCaptureDetail($idCapture);
    }
}
