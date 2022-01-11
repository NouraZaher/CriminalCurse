<?php include 'includes/head.php';?>
<style media="screen">
body{
  background-image: url("images/prison-doors.jpg");
}
</style>
  <body>
<?php include 'includes/navbar.php';?>


<center>
<br>
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
          <button onclick="up()" type="button" name="button" class="btn btn-dark"> upload criminal data </button>
          <button onclick="location.reload();" type="button" name="button" class="btn btn-success"> Reload Data </button>
        </div>
        <div class="col">

          <div class="row">
            <div class="col">
              <input id="criminalname" type="text" class="form-control" placeholder="Name">
            </div>
            <div class="col">
              <input id="criminalage" type="number" class="form-control" placeholder="Age">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <input id="criminalstatus" type="number" class="form-control" min="1" max="10" placeholder="Dangerous Statues">
            </div>
            <div class="col">
              <input id="criminalplace" type="text" class="form-control" placeholder="Last Seen Place">
            </div>
          </div>

        </div>
      </div>
    </div>


  </form>
<div class="Progress-js">

</div>
  </div>
</div>
</div>


<div class="container">
  <p style="color: white;">Suspect Images: </p>
</div>
<br>
<div class="container">
  <div class="card-deck">
    <section id="cardsContainer" class="row justify-content-center">
    <section>
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
  var imagename = Math.random().toString(36).substring(7) + "." + image.name.split('.').pop();
  console.log(imagename)
  var uploadTask = storageRef.child("/stations" + username_ + "/Wanted/" + imagename).put(image, metadata);
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
        document.querySelector(".Progress-js").innerHTML = tempprog;
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
      }).then(()=> {
      firebase.database().ref('criminal/' + imagename.split(".")[0]).set({
      "username": JSON.parse(localStorage.getItem('dataUser'))["username"],
      "Name": document.getElementById("criminalname").value,
      "Age": document.getElementById("criminalage").value,
      "Status": document.getElementById("criminalstatus").value,
      "Place": document.getElementById("criminalplace").value,
      "image": imagename,
  }).then(e=> console.log("Done!!")).catch((e)=>{console.log("Error", e)})
      });

    }
  );
}

</script>
<?php include 'includes/config/config.php'; ?>

<script type="text/javascript">
let username__ = JSON.parse(localStorage.getItem('dataUser'))["username"] || "Test"
let urlPrv = (Urname, imageName_) => `https://firebasestorage.googleapis.com/v0/b/criminals-curse-1592081187332.appspot.com/o/stations%2F${encodeURIComponent(Urname +"/Wanted/"+ imageName_)}?alt=media`
  var storage    = firebase.storage();
  var storageRef = firebase.storage().ref("stations/" + username__ + "/Wanted");
      storageRef.listAll().then(function(result) {
        var i = 0;
        result.items.forEach(function(imageRef, i) {
          console.log(imageRef.name);
          var starCountRef = firebase.database().ref('criminal/'+ imageRef.name.split(".")[0]);
           starCountRef.on('value', (snapshot) => {
             let username__ = JSON.parse(localStorage.getItem('dataUser'))["username"] || "Test"
            const data = snapshot.val();
            if(`${data.username}`===username__){
          let loading =  document.querySelector('.loading-' + i)
          loading.hidden = true
          loading.insertAdjacentHTML("beforebegin", `<p>Name: ${data.Name}</p>
          <p>Age: ${data.Age}</p>
          <p>Place: ${data.Place}</p>
          <p>Status: ${data.Status}</p>
          `
        );

      }

          console.log(data)
        });
        let temp = `
        <div class="col-lg-3 col-md-5">
      <div class="card">
      <img src=${urlPrv(username__, imageRef.name)} class="card-img-top" alt="...">
      <div class="card-body text-start">
      <h6 class="loading-${i}">You do not have access to this Criminal (Belongs to another Police Station)</h6>
      <button class="btn btn-danger" data-image="${imageRef.name}" onclick="database.ref().child('criminal/${imageRef.name.split(".")[0]}').remove(); deleteimage('${username__ + "/Wanted/" + imageRef.name}'); setTimeout(function(){ window.location.reload(1); }, 200);" type="button" name="button" >Delete</button>
      </div>
      </div>
      </div>
        `
        document.getElementById("cardsContainer").innerHTML += temp;




      });
        });





        function deleteimage(selectedimage){

   var storage  = firebase.storage();
   var storageRef = storage.ref();
   var desertRef = storageRef.child('stations/'+selectedimage);
 desertRef.delete().then(() => {

 }).catch((error) => {

 });
 }

/*
<p>Name: ${data.Name}</p>
<p>Age: ${data.Age}</p>
<p>Place: ${data.Place}</p>
<p>Status: ${data.Status}</p>
*/


</script>

<script src="includes/js/FFunctions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
