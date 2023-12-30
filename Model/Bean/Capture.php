<?php
class Capture
{
    private $IdCapture;
    private $IdBot;
    private $Time;
    private $CaptureResult;
    public function __construct($IdCapture, $IdBot, $Time, $CaptureResult)
    {
        $this->IdCapture = $IdCapture;
        $this->IdBot = $IdBot;
        $this->Time = $Time;
        $this->CaptureResult = $CaptureResult;
    }
    public function getIdCapture()
    {
        return $this->IdCapture;
    }
    public function getIdBot()
    {
        return $this->IdBot;
    }
    public function getTime()
    {
        return $this->Time;
    }
    public function getCaptureResult()
    {
        return $this->CaptureResult;
    }
    public function setIdCapture($IdCapture)
    {
        $this->IdCapture = $IdCapture;
    }
    public function setIdBot($IdBot)
    {
        $this->IdBot = $IdBot;
    }
    public function setTime($Time)
    {
        $this->Time = $Time;
    }
    public function setCaptureResult($CaptureResult)
    {
        $this->CaptureResult = $CaptureResult;
    }
}
