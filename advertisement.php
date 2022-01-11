<?php include 'includes/head.php';?>
<style media="screen">
body{
  background-image: url("images/prison-doors.jpg");
}
</style>
  <body>
<?php include 'includes/navbar.php';?>

<br>
<div class="container">
  <p style="color: white;">Advertisement Images: </p>
</div>
<br>
<div class="container">
  <div class="card-deck">
    <section id="cardsContainer" class="row justify-content-center">
    <section>
 </div>
</div>

<?php include 'includes/config/config.php'; ?>
<script src="includes/js/FFunctions.js"></script>
<script type="text/javascript">

let username_ = JSON.parse(localStorage.getItem('dataUser'))["username"] || "Test"
let urlPrv = (Urname, imageName) => `https://firebasestorage.googleapis.com/v0/b/criminals-curse-1592081187332.appspot.com/o/stations%2F${encodeURIComponent(Urname +"/Announcements/"+ imageName)}?alt=media`
  var storage    = firebase.storage();
  var storageRef = firebase.storage().ref("stations/" + username_ + "/Announcements");
      storageRef.listAll().then(function(result) {
        var i = 0;
        result.items.forEach(function(imageRef) {
          console.log(`${urlPrv(username_, imageRef.name)}`);
          let temp = `
          <div class="col-lg-3 col-md-5">
    <div class="card">
      <img src=${urlPrv(username_, imageRef.name)} class="card-img-top" alt="...">
      <div class="card-body">
      <h6> ${imageRef.name} </h6>
        <button class="btn btn-danger" onclick="deleteimage('${username_ + "/Announcements/" + imageRef.name}'); setTimeout(function(){ window.location.reload(1); }, 200);" type="button" name="button" >Delete</button>
      </div>
    </div>
    </div>
          `
          document.getElementById("cardsContainer").innerHTML += temp;
          //document.getElementById("div_id").innerHTML=document.getElementById("div_id").innerHTML+ '<img src="" alt="" class="card-img-top"> </img>';
          //document.write('<img src="" alt="" width="50%"> </img>');
          console.log(imageRef);
          //document.write(' <button onclick="deleteimage(\'' +imageRef.name + '\')" type="button" name="button" >Delete</button> ');
          //document.getElementById("div_id").innerHTML=document.getElementById("div_id").innerHTML+ '<button class="btn btn-danger" onclick="deleteimage(\'' +imageRef.name + '\')" type="button" name="button" >Delete</button> ';

          //displayImage(imageRef,i);
          i++;
        });

      }).catch(function(error) {
      });

      function displayImage(imageRef,i) {
        imageRef.getDownloadURL().then(function(url) {
          var images = document.querySelectorAll('img');
          var image=images[i];
                  image.src=url;
        }).catch(function(error) {
        });

        imageRef.getDownloadURL().then(function(url) {
          console.log(i);
        }).catch(function(error) {
        });

      }

  function deleteimage(selectedimage){
    console.log("cat");
    var storage  = firebase.storage();
    var storageRef = storage.ref();
    var desertRef = storageRef.child('stations/'+selectedimage);
  desertRef.delete().then(() => {

  }).catch((error) => {
  });
  }

</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
