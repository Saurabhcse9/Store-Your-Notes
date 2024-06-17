

<?php 
//Connecting to the database
$insert=FALSE;
$update=FALSE;
$delete=FALSE;
$servername="localhost";
$username="root";
$password="";
$database="inote";

//create a connection object
$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Unable to connect to the databse".mysqli_connect_error());
}
else{
    //echo "connected successfully<br>";
}
//Deleting Record

if(isset($_GET['delete'])){
  $sno=$_GET['delete'];
  //Debug Statement: echo $sno;
  $sql="DELETE FROM `notes` WHERE `notes`.`sno`='$sno'";
  $result=mysqli_query($conn,$sql);
  if($result){
    $delete=TRUE;
  }
}
//Inserting Data from the from into the databse
if($_SERVER['REQUEST_METHOD']=='POST'){

  if (isset( $_POST['snoEdit'])){
    //Update the record
    //Debug Statement: echo "Inside";
    $title=$_POST['new_title'];
    $description=$_POST['editdesc'];
    $sno=$_POST["snoEdit"];
    $sql="UPDATE `notes` SET `title`='$title',`description`='$description' WHERE `notes`.`sno`='$sno'";
    $result=mysqli_query($conn,$sql);

    if($result){
        $update=TRUE;
        // Debug Statement :echo "Done Successfully";
    }
    else{
      //Debug Stement: echo "Failed";
    }
  }

  else {
 // Insert The record
   // Debug Statement echo "Outside";
    $title=$_POST["title"];
    $description=$_POST["desc"];

    $sql="INSERT INTO `notes`(`title`,`description`) VALUES('$title','$description')";
    $result=mysqli_query($conn,$sql);

    if($result){
        $insert=TRUE;
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" >
    
   

    <title>SYN</title>
  </head>
  <body>


<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodal">Edit this note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="http://localhost/code_with_harry_php/CRUD/inote.php" method="post">
      <div class="modal-body">
      
        <input type="hidden" name="snoEdit" id="snoEdit">
  <div class="form-group">
    <label for="edittitle">Edit Title</label>
    <input type="text" class="form-control" id="new_title" name="new_title">
  </div>
  <div class="form-group">
    <label for="editdesc">Edit Description</label>
    <textarea class="form-control" id="editdesc" name="editdesc" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="/code_with_harry_php/CRUD/logo/syn_logo.png" height="33px"></a>
  <a class="navbar-brand" href="#">SYN</a>
</nav>
<?php
if($insert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Note added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($update){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Note Updated Successfully.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
if($delete){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Note Deleted.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
?>
<div class="container my-4">
    <h2>Add a note </h2>
<form action="http://localhost/code_with_harry_php/CRUD/inote.php" method="post">
  <div class="form-group">
    <label for="title">Note Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="desc">Note Description</label>
    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
</div>

<div class="container" my-M_PI_4>


<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
//Selecting from database
$sql="SELECT * FROM `notes`";
$result=mysqli_query($conn,$sql);
$sn=0;
while($row=mysqli_fetch_assoc($result))
{   $sn=$sn+1;
    echo "<tr>
    <th scope='row'>".$sn."</th>
    <td>".$row['title']."</td>
    <td>".$row['description']."</td>
    <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> 
    <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
    </tr>";

}

?>
    
  </tbody>
</table>
<hr>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> 
    <script>$(document).ready(function(){$('#myTable').DataTable();});</script>  

    <script>
     edits=document.getElementsByClassName('edit');
     Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr=e.target.parentNode.parentNode;
        title=tr.getElementsByTagName("td")[0].innerText;
        description=tr.getElementsByTagName("td")[1].innerText;
        console.log(title,description);
        new_title.value=title;
        editdesc.value=description;
        $('#editmodal').modal('toggle');
        snoEdit.value = e.target.id;
        console.log(snoEdit.value)
        })})
        
        deletes=document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
        console.log("edit ");
        sno=e.target.id.substr(1,);
        if (confirm("Are you sure, you want to delete this note ?")){
          console.log("yes");
          window.location=`/code_with_harry_php/CRUD/inote.php?delete=${sno}`;
        }
        })})</script>
</body>
</html>