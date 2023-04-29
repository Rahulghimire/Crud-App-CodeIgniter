<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HTML Form</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/js/bootstrap.min.js';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/jquery-3.6.4.js';?>">
<style>
.add-button{
    margin:25px;
    position:relative;
}
.logout{
    position:absolute;
    right:0;
    top:0;
}
.username{
  position:absolute;
  right:90px;
  top:5px;
}
</style>

</head>

<body>
    <section class="add-button d-flex align-items-center">
    <form action="<?php echo base_url().'index.php/User/insert'?>">
    <input type="submit" value="Add User +" class="btn btn-outline-success">
    </form>
<div>
<?php 
        $auth_user = $this->session->userdata('auth_user');
        if($auth_user){
        echo '<a class="username text-primary mx-0 px-0 text-decoration-none" id="profile" href="<?php echo base_url()?>">' .$auth_user['name'] . '</a>';
        }?>
    <a href="<?php echo base_url().'index.php/Auth/LogoutController/logout'?>" class="btn btn-primary logout">Logout</a>  
</div>
   
    </section>
</body>
<script>
const profile=document.getElementById("profile");
profile.setAttribute("href","<?php echo base_url()?>index.php/User/profile/index");
</script>
</html>