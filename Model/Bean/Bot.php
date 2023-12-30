<?php
class Bot
{
    private $Id;
    private $Ip;
    private $Port;
    private $Status;
    private $Remove;
    public function __construct($Id, $Ip, $Port, $Status, $Remove)
    {
        $this->Id = $Id;
        $this->Ip = $Ip;
        $this->Port = $Port;
        $this->Status = $Status;
        $this->Remove = $Remove;
    }
    public function getId()
    {
        return $this->Id;
    }
    public function getIp()
    {
        return $this->Ip;
    }
    public function getPort()
    {
        return $this->Port;
    }
    public function getStatus()
    {
        return $this->Status;
    }
    public function getRemove()
    {
        return $this->Remove;
    }
    public function setId($Id)
    {
        $this->Id = $Id;
    }
    public function setIp($Ip)
    {
        $this->Ip = $Ip;
    }
    public function setPort($Port)
    {
        $this->Port = $Port;
    }
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }
    public function setRemove($Remove)
    {
        $this->Remove = $Remove;
    }
}
