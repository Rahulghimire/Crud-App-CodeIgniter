<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script type="text/javascript"src="<?php echo base_url().'assets/jquery-3.6.4.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <style>
    .listing{
        margin:20px;
        }
    .table td, .table th {
    padding: 0.75rem;
    vertical-align: middle;
    }
.btn:focus,
.btn:active {
  outline: none !important;
  box-shadow: none !important;
}
.alert{
  position:absolute;
  top:0;
  left:0;
}
    </style>
</head>
<body>
  <section class="listing">
  <?php
  // $data = $_SESSION; 
  // print_r($data);
    $status = $this->session->flashdata('status');
    if($status){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $status . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>';
    }
?>

    <div class="row">
    <div class="col">
    <div class="table-responsive-sm table-responsive-md ">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Province</th>
      <th scope="col">Gender</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($users)) {foreach($users as $user){?>
     <tr>
      <th scope="row"><?php echo $user['name']; ?></th>
      <td><?php echo $user['email']?></td>
      <td><?php echo $user['pnumber'] ?></td>
      <td><?php echo $user['province'] ?></td>
      <td><?php echo $user['gender'] ?></td>
      <td><?php echo $user['dob'] ?></td>
      <td>
      <button class="border-0 btn btn-outline-none py-0"> <a href="<?php echo base_url().'index.php/User/update/'.$user['id']?>" id="update" class="btn btn-secondary">Update</a></button>
      <button class="border-0 btn btn-outline-none py-0 my-1 my-md-1" onclick="myFunctionDelete(<?php echo $user['id']?>)"><a id="delete" class="btn btn-danger">Delete</a></button>  
      </td>
    </tr>
<?php }} else{ ?>
    <tr>Records Not Found</tr>
    <?php } ?>
   
  </tbody>
</table>
</div>    
</div>
</div>
</section>
<script>

function myFunctionDelete(id) {
  if (confirm("Do you want to perform Delete?")) {
    console.log(id);
    window.location.href = "<?php echo base_url();?>index.php/User/delete/"+id;	
} 
}
setTimeout(function() {
    window.close();
}, 5000);

</script>
</body>
</html>