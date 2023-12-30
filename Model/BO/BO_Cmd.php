<?php
include_once("../Model/Bean/Cmd.php");
include_once("../Model/DAO/DAO_Cmd.php");
class BO_Cmd
{
    public function addCmd($idbot, $detail, $content)
    {
        $daoCmd = new DAO_Cmd();
        $daoCmd->addCmd($idbot, $detail, $content);
    }
    public function getListCmd($idbot)
    {
        $daoCmd = new DAO_Cmd();
        return $daoCmd->getListCmd($idbot);
    }
    public function getCmdDetail($idCmd)
    {
        $daoCmd = new DAO_Cmd();
        return $daoCmd->getCmdDetail($idCmd);
    }
}
