<?php include 'includes/head.php';?>
<style media="screen">
body{
  background-image: url("images/prison-doors.jpg");
}
</style>
  <body>
<?php include 'includes/navbar.php';?>


<center>
<br> <br>
<div class="container">
<div class="container">

  <div class="card border-primary mb-3">
    <br>
  <form enctype="multipart/form-data">

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="container">
          <input type="file" name="" id="image" value="" accept="image/*"> <br> <br>
        </div>
          <button onclick="up()" type="button" name="button" class="btn btn-dark"> upload image </button>
          <button onclick="location.reload();" type="button" name="button" class="btn btn-success"> Reload Data </button>
        </div>
      </div>
    </div>


  </form>
<div class="Progresss-js">

</div>
  </div>
</div>
</div>


</center>


</script>
<script type="text/javascript">
let username_ = "/" + JSON.parse(localStorage.getItem('dataUser'))["username"] || "/" + "Test"
function up() {
  var metadata = {
    contentType: 'image/*'
  };
  var image = document.getElementById("image").files[0];
  var imagename = image.name;
  var uploadTask = storageRef.child("/stations" + username_ + "/Announcements/" + imagename).put(image, metadata);
  uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED,
    (snapshot) => {
      var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
      console.log('Upload is ' + progress + '% done');
      switch (snapshot.state) {
        case firebase.storage.TaskState.PAUSED:
          console.log('Upload is paused');
          break;
        case firebase.storage.TaskState.RUNNING:
          console.log('Upload is running');
          break;
      }

      let tempprog = `
       <div class="progress">
          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: ${progress}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">${progress}</div>
        </div>
        `
        document.querySelector(".Progresss-js").innerHTML = tempprog;
    },
    (error) => {
      switch (error.code) {
        case 'storage/unauthorized':
          break;
        case 'storage/canceled':
          break;
        case 'storage/unknown':
          break;
      }
    },
    () => {
      uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
        console.log('File available at', downloadURL);
      });
    }
  );
}
</script>
<?php include 'includes/config/config.php'; ?>
<script src="includes/js/FFunctions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
