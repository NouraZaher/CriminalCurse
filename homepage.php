<?php include 'includes/head.php';?>

<style media="screen">
body{
  background-image: url("images/prison-doors.jpg");
}
</style>

  <body>
<?php include 'includes/navbar.php';?>
<br>



    <div class="row">

      <div class="col-3">
  <div class=" border-dark mb-3">
        <div class="container">
        <div class="container">
          <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="images/prof.jpg" style="width: 100%" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" data-username>Officer Name</h5>
              <a href="#" class="btn btn-primary" data-logout>Logout</a>
            </div>
          </div>
        </div>
        </div>
        </div>

      </div>

      <div class="col-9">

        <div class="container">
          <div class="card-deck">

            <section id="cardsContainer" class="row justify-content-center">


                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fas fa-users"></i> Add and manage Users </h5>
                      <p class="card-text">Add new users and manage them after they submit there application</p>
                      <a href="users.php" class="btn btn-primary">Go to page</a>
                    </div>
                  </div>

                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-ad"></i> Upload Advertisement</h5>
                        <p class="card-text">Upload the advertisement viewed inside the phone application</p>
                        <a href="uploadad.php" class="btn btn-warning">Go to page</a>
                      </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-ad"></i> Manage Advertisements</h5>
                        <p class="card-text">View and Delete the advertisement viewed inside the phone application</p>
                        <a href="advertisement.php" class="btn btn-danger">Go to page</a>
                      </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Add Moderators</h5>
                        <p class="card-text">Add new and delete moderators to manage the web application </p>
                        <a href="mods.php" class="btn btn-light">Go to page</a>
                      </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-upload"></i>  Upload a Criminal</h5>
                        <p class="card-text">Upload an image and information to the wanted list</p>
                        <a href="upload.php" class="btn btn-dark">Go to page</a>
                      </div>
                    </div>


            </section>

          </div>
         </div>

      </div>
    </div>


<?php include 'includes/config/config.php'; ?>

<script type="text/javascript">
if (localStorage.getItem('dataUser') != null) {
document.querySelector("[data-username]").innerText = JSON.parse(localStorage.getItem('dataUser'))["username"]
}

document.querySelector("[data-logout]").addEventListener("click",

function() {
  localStorage.removeItem('dataUser');
  location.href = location.pathname.replace(/[^\/]+(?=\/$|$)/, "");

}

)

</script>

<script src="includes/js/FFunctions.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
