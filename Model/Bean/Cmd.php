<?php
class Cmd
{
    private $IdCmd;
    private $IdBot;
    private $Time;
    private $Cmd;
    private $CmdResult;
    public function __construct($IdCmd, $IdBot, $Time, $Cmd, $CmdResult)
    {
        $this->IdCmd = $IdCmd;
        $this->IdBot = $IdBot;
        $this->Time = $Time;
        $this->Cmd = $Cmd;
        $this->CmdResult = $CmdResult;
    }
    public function getIdCmd()
    {
        return $this->IdCmd;
    }
    public function getIdBot()
    {
        return $this->IdBot;
    }
    public function getTime()
    {
        return $this->Time;
    }
    public function getCmd()
    {
        return $this->Cmd;
    }
    public function getCmdResult()
    {
        return $this->CmdResult;
    }
    public function setIdCmd($IdCmd)
    {
        $this->IdCmd = $IdCmd;
    }
    public function setIdBot($IdBot)
    {
        $this->IdBot = $IdBot;
    }
    public function setTime($Time)
    {
        $this->Time = $Time;
    }
    public function setCmd($Cmd)
    {
        $this->Cmd = $Cmd;
    }
    public function setCmdResult($CmdResult)
    {
        $this->CmdResult = $CmdResult;
    }
}
