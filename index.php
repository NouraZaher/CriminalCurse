<?php include 'includes/head.php';?>
<style media="screen">
.back {
background: #e2e2e2;
width: 100%;
position: absolute;
top: 0;
bottom: 0;
}

.div-center {
width: 400px;
height: 400px;
background-color: #fff;
position: absolute;
left: 0;
right: 0;
top: 0;
bottom: 0;
margin: auto;
max-width: 100%;
max-height: 100%;
overflow: auto;
padding: 1em 2em;
border-bottom: 2px solid #ccc;
display: table;
}

div.content {
display: table-cell;
vertical-align: middle;
}

body{
  background-image: url("images/prison-doors.jpg");

}

</style>
  <body>
    <div class="alert-is-there container py-4" hidden>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Hey You!</strong> check from your password and username
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
    <div class="div-center">
        <div class="content">
          <h3>Moderator login</h3>
          <hr>
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="usernameLogin" placeholder="Username">
            </div>
            <br>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="passwordLogin" placeholder="Password">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" onclick="login();return false;">Login</button>
          </form>
        </div>
      </div>
<?php include 'includes/config/config.php'; ?>
<script src="includes/js/loggedin.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
