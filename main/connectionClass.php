<?php
class connectionClass extends mysqli{
    public $host="localhost",$dbname="tmx-tbu",$dbpass="Tagmx2021!",$dbuser="tmx-tbu";
    public $con;
    
    public function __construct() {
        if($this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname)){}
        else
        {
            return;
        }
    }
}
