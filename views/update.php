<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to HTML Form</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
  
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/js/bootstrap.min.js';?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/jquery-3.6.4.js';?>">

    <!-- STYLES -->

    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            margin:20px;
            height:100%;
        }
        .title{
          text-align:center;
        }
        .form{
          margin:10px;
        }
    </style>
</head>
<body>
<div class="wrapper">
<header>
  <h3 class="title">User Registration Form Update</h3>
    </header>
<section class="form">

<form  action="<?php echo base_url().'index.php/User/update/'.$user['id'];?>" class="form" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name" name="name" value="<?php echo set_value('name',$user['name']); ?>">
    <small id="nameHelp" class="form-text text-danger"><?php echo form_error('name')?></small>
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="john@example.com" name="email" value="<?php echo set_value('email',$user['email']); ?>">
    <small id="emailHelp" class="form-text text-danger"><?php echo form_error('email')?></small>

  </div>
  <div class="form-group">
    <label for="exampleInputPhone">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="+977" name="phone" pattern="[0-9]{10}" value="<?php echo set_value('phone',$user['pnumber']); ?>">
    <small id="emailHelp" class="form-text text-danger"><?php echo form_error('phone')?></small>
  </div>
<div class="form-group">
  <label for="province d-block">Province</label>
<select class="form-select" aria-label="Default select example" name="province">
  <option disabled selected>Select Province</option>
  <option  value="Province 1" <?php echo set_select('province', 'Province 1', ($user['province'] == 'Province 1')); ?>>Province 1</option>
  <option value="Province 2" <?php echo set_select('province', 'Province 2', ($user['province'] == 'Province 2')); ?>>Province 2</option>
  <option value="Province 3" <?php echo set_select('province', 'Province 3', ($user['province'] == 'Province 3')); ?>>Province 3</option>
</select>
<small id="emailHelp" class="form-text text-danger"><?php echo form_error('province')?></small>

</div>
  <div class="form-group form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male"<?php echo set_radio('gender', 'Male', $user['gender'] == 'Male'); ?>>
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-group form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female"<?php echo set_radio('gender', 'Female', $user['gender']== 'Female'); ?>>
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
<small id="emailHelp" class="form-text text-danger"><?php echo form_error('gender')?></small>

<div class="form-group"> 
        <label class="control-label" for="date">Date Of Birth</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date" value="<?php echo set_value('date',$user['dob']); ?>" min="1935-01-01" max="<?php echo date('Y-m-d') ?>"/>
      </div>
    <small id="emailHelp" class="form-text text-danger"><?php echo form_error('date')?></small>
<div class="form-group">
<input type="submit" value="Update" class="btn btn-primary">
<a href="<?php echo base_url().'index.php/User/index'?>" class="btn btn-secondary">Cancel</a>
</div>
</form>
</section>
</div>
<script>
</script>
</body>
</html>
