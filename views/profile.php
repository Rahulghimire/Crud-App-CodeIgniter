<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style>
    .gradient-custom {

      background: #f6d365;
      background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
      background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
</style>
</head>
<body>

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="<?php echo base_url()?>assets/rahul.jpg"
                id="user-image"
                alt="Avatar" class="img-fluid my-5 rounded-circle mb-3" style="width: 100px;" />
               <?php  $auth_user = $this->session->userdata('auth_user');
              echo '<h5>' .$auth_user['name'] . '</h5>';
            ?>
              <p>Position</p>
              <div class="mx-0 px-0"></div>
              <?php  $auth_user = $this->session->userdata('auth_user')?>
              <a class="text-white mx-0 px-0" href="<?php echo base_url()?>index.php/User/userEditHandler"><i class="far fa-edit mb-5"></i></a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-12 mb-3">
                    <h6>Email</h6>
                    <?php  $auth_user = $this->session->userdata('auth_user');
                    echo '<p class="text-muted">' .$auth_user['email'].'</p>'?>
                  </div>
                  <div class="col-12 mb-3">
                    <h6>Full Name</h6>
                    <?php  $auth_user = $this->session->userdata('auth_user');
                     echo '<p class="text-muted">' .$auth_user['name'] . '</p>'?></div>
                </div>

                <div class="col-12 mb-3">
                </div>
                <hr class="mt-0 mb-4">
                <div class="d-flex justify-content-start">
                  <a href="https://www.facebook.com/profile.php?id=100009548280167"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
  </div>
</section>
<script>
  
  const image=document.querySelector("#user-image");
  console.log(image);
      // const dataUrl = image.toDataURL();
      // console.log(dataUrl);

</script>
</body>
</html>