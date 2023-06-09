<?php
include "inheritance.php";

$user = new crud();

$record = $user->Display();

if(isset($_GET['id']))
{
    $del = $user->deleteData($_GET['id']);
    if($del){
        header("Location:table.php");
    }else{
        echo $del."error";
    }
}
?>
<html>
    <head>
        <title></title>
            <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573">
  Employee's Details
</nav>
<div class="container">
    
<button  class="btn btn-dark mb-3"> <a href="form.php" style="text-decoration:none;color:white;">Add New</a></button>
<table class="table table-hover text-center ">
      <thead class="table-dark ">
      <tr>
        
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone</th>
            <th scope="col">Position</th>
            <th scope="col">Action</th>
        </tr>
      </thead>
        <?php foreach($record as $val){ ?>
        <tr>
            <td><?php echo $val['id']?></td>
            <td><?php echo $val['first_name']?></td>
            <td><?php echo $val['last_name']?></td>
            <td><?php echo $val['email']?></td>
            <td><?php echo $val['gender']?></td>
            <td><?php echo $val['phone']?></td>
            <td><?php echo  $val['position']?></td>

            <td>
                <a href="single_view.php?id=<?php echo $val['id']?>">
                     <i class="fa-solid fa-eye fs-5 link-dark me-3"  style="text-decoration:none;"></i></a>
               <a href="edit.php?id=<?php echo $val['id']?>"  style="text-decoration:none;">            
                <i class="fa-solid fa-pen-to-square fs-5 link-dark me-3" ></i>
               </a>
               <a href="table.php?id=<?php echo $val['id']?>" style="text-decoration:none;">
                <i class="fa-solid fa-trash fs-5 link-dark me-3"></i>
               </a></td>

        </tr>
        <?php }?>
    </table>   
</div>        
   
  
<div style="position:fixed;text-decoration:none;;bottom:0;right:0;margin:25px;" >
   <a href="open_page.php"  
    style="text-decoration:none;"
     class="text-white"> <button class="btn btn-dark">log out</button></a>
</div>
      
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

   
    </body>
</html>