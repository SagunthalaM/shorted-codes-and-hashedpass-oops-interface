<?php
 //realigned code shorted as Code improve channel
include "abstract.php";

class crud extends Users{
    
    use connect;

  public function connection(){
    $this->con = mysqli_connect("localhost","root","","tutorial");
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
    }
  }

    public function runQuery($sql){
        $runQuery = mysqli_query($this->con,$sql);
        if($runQuery){
            return $runQuery;
            //here I made a mistake as true .so Be carefull
        }else{
            return mysqli_errno($this->con);
        }
    }
 
    public function addRecord(){
      
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $position = $_POST['position'];

        $query="INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`,`phone`,`position`)
        VALUES ('null','$first_name','$last_name','$email','$gender','$phone','$position')";
        $response = $this->runQuery($query);
        return $response;
            
    }
    //table is function is the display the employees record
    public function Display(){
        $query = "SELECT * FROM crud";
        $response = $this->runQuery($query);
        $responseArray=[];
        while($data = mysqli_fetch_array($response)){
            $responseArray[]=$data;
        }
       return $responseArray;
       
    }
    public function getFormData(){
        $id = $_GET['id'];
        $query = "SELECT * FROM crud where id = '".$id."' ";
        $response = $this->runQuery($query);
        $getData = mysqli_fetch_array($response);
        return $getData;
    }
    public function updatedata(){

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $position = $_POST['position'];
        $id = $_GET['id'];
      
        $query="UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',
        `gender`='$gender',`phone`='$phone',`position`='$position' WHERE `id`=$id";
         
         $response = $this->runQuery($query);
         return $response;
     }

    public function deleteData(){
        $id = $_GET['id'];
        $query = "delete FROM crud where id = '".$id."' ";
        $response = $this->runQuery($query);
        return $response;
    }

}

?>