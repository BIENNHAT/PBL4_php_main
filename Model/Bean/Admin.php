<?php
class Admin
{
    private $Id;
    private $Username;
    private $Password;
    public function __construct($Id, $Username, $Password)
    {
        $this->Id = $Id;
        $this->Username = $Username;
        $this->Password = $Password;
    }
    public function getId()
    {
        return $this->Id;
    }
    public function getUsername()
    {
        return $this->Username;
    }
    public function getPassword()
    {
        return $this->Password;
    }
    public function setId($Id)
    {
        $this->Id = $Id;
    }
    public function setUsername($Username)
    {
        $this->Username = $Username;
    }
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }
}
