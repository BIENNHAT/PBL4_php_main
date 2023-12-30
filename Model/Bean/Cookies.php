<?php
class Cookies
{
    private $IdCookies;
    private $IdBot;
    private $Time;
    private $Url;
    private $CookiesResult;
    public function __construct($IdCookies, $IdBot, $Time, $Url, $CookiesResult)
    {
        $this->IdCookies = $IdCookies;
        $this->IdBot = $IdBot;
        $this->Time = $Time;
        $this->Url = $Url;
        $this->CookiesResult = $CookiesResult;
    }
    public function getIdCookies()
    {
        return $this->IdCookies;
    }
    public function getIdBot()
    {
        return $this->IdBot;
    }
    public function getTime()
    {
        return $this->Time;
    }
    public function getUrl()
    {
        return $this->Url;
    }
    public function getCookiesResult()
    {
        return $this->CookiesResult;
    }
    public function setIdCookies($IdCookies)
    {
        $this->IdCookies = $IdCookies;
    }
    public function setIdBot($IdBot)
    {
        $this->IdBot = $IdBot;
    }
    public function setTime($Time)
    {
        $this->Time = $Time;
    }
    public function setUrl($Url)
    {
        $this->Url = $Url;
    }
    public function setCookiesResult($CookiesResult)
    {
        $this->CookiesResult = $CookiesResult;
    }
}
