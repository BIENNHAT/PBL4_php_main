<?php
include_once("../Model/Bean/Keylogger.php");
include_once("../Model/DAO/DAO_Keylogger.php");
class BO_Keylogger
{
    public function addKeylogger($idbot, $detail, $content)
    {
        $daoKeylogger = new DAO_Keylogger();
        $daoKeylogger->addKeylogger($idbot, $detail, $content);
    }
    public function getListKeylogger($idbot,$page)
    {
        $daoKeylogger = new DAO_Keylogger();
        return $daoKeylogger->getListKeylogger($idbot,$page);
    }
    public function getCountListKeylogger($idbot)
    {
        $daoKeylogger = new DAO_Keylogger();
        return $daoKeylogger->getCountListKeylogger($idbot);
    }
    public function getKeyloggerDetail($idKeylogger)
    {
        $daoKeylogger = new DAO_Keylogger();
        return $daoKeylogger->getKeyloggerDetail($idKeylogger);
    }
}
