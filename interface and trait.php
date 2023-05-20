<?php
interface ConfigureBase{
    public function __construct();
}
trait connect{
    private $con;
    public function __construct(){
     $this->connection();
}
}

?>

   