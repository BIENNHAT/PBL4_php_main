<?php
class Keylogger
{
    private $IdKeylogger;
    private $IdBot;
    private $KeyloggerResult;
    private $TimeStart;
    private $TimeStop;
    public function __construct($IdKeylogger, $IdBot, $KeyloggerResult, $TimeStart, $TimeStop)
    {
        $this->IdKeylogger = $IdKeylogger;
        $this->IdBot = $IdBot;
        $this->KeyloggerResult = $KeyloggerResult;
        $this->TimeStart = $TimeStart;
        $this->TimeStop = $TimeStop;
    }
    public function getIdKeylogger()
    {
        return $this->IdKeylogger;
    }
    public function getIdBot()
    {
        return $this->IdBot;
    }
    public function getKeyloggerResult()
    {
        return $this->KeyloggerResult;
    }
    public function getTimeStart()
    {
        return $this->TimeStart;
    }
    public function getTimeStop()
    {
        return $this->TimeStop;
    }
    public function setIdKeylogger($IdKeylogger)
    {
        $this->IdKeylogger = $IdKeylogger;
    }
    public function setIdBot($IdBot)
    {
        $this->IdBot = $IdBot;
    }
    public function setKeyloggerResult($KeyloggerResult)
    {
        $this->KeyloggerResult = $KeyloggerResult;
    }
    public function setTimeStart($TimeStart)
    {
        $this->TimeStart = $TimeStart;
    }
    public function setTimeStop($TimeStop)
    {
        $this->TimeStop = $TimeStop;
    }
}
