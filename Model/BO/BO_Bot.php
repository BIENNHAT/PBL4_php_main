<?php
include_once("../Model/Bean/Bot.php");
include_once("../Model/DAO/DAO_Bot.php");
class BO_Bot
{
    public function getAllBot()
    {
        $daoBot = new DAO_Bot();
        return $daoBot->getAllBot();
    }
    public function getBotDetail($idBot)
    {
        $allBot = $this->getAllBot();
        foreach ($allBot as $index => $Bot) {
            if ($Bot->getId() == $idBot) {
                return $Bot;
            }
        }
        return null;
    }
    public function getBotActive()
    {
        $daoBot = new DAO_Bot();
        return $daoBot->getBotActive();
    }
    public function getBotPassive()
    {
        $daoBot = new DAO_Bot();
        return $daoBot->getBotPassive();
    }
    public function controlOneBot($ID)
    {
        $daoBot = new DAO_Bot();
        $daoBot->controlOneBot($ID);
    }
    public function controlAllBot()
    {
        $daoBot = new DAO_Bot();
        $daoBot->controlAllBot();
    }
    public function addBot($ip, $port)
    {
        $daoBot = new DAO_Bot();
        $daoBot->addBot($ip, $port);
    }
    public function resetBotStatus()
    {
        $daoBot = new DAO_Bot();
        $daoBot->resetBotStatus();
    }
    public function resetBotStatusWithId($ID)
    {
        $daoBot = new DAO_Bot();
        $daoBot->resetBotStatusWithId($ID);
    }
    public function getIdBot($ip, $port)
    {
        $daoBot = new DAO_Bot();
        return $daoBot->getIdBot($ip, $port);
    }
    public function exitBot($id)
    {
        $daoBot = new DAO_Bot();
        return $daoBot->exitBot($id);
    }
}
