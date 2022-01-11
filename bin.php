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

  <div class="container">
    <div class="row">
      <div class="col">
        <h4 style="color: white;"> Reports History: </h4>
      </div>
      <div class="col-md-auto">
      </div>
      <div class="col col-lg-2">
        <a type="button" name="button" class="btn btn-success" href="suspects.php">Go back</a>
      </div>
    </div>
  </div>
  <br>
<div class="card card-primary card-outline">
<table class="table">
<thead>
  <tr>
    <th>Video</th>
    <th scope="col">Age</th>
    <th scope="col">Email</th>
    <th scope="col">Note</th>
    <th scope="col">Phone Number</th>
    <th scope="col">Latitude</th>
    <th scope="col">Longitute</th>
    <th scope="col">Full Name</th>
    <th scope="col">Delete</th>

  </tr>
</thead>
<tbody id="report_History_">

</tbody>
</table>
</div>
</div>


<?php include 'includes/config/config.php'; ?>
<script src="includes/js/FFunctions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
var res_readData = firebase.database().ref('reportHistory/');
res_readData.on('value', (snapshot) => {
  const data = snapshot.val();
  let dataArray = data;
  document.querySelector("#report_History_").innerHTML = "";
  let username_ = JSON.parse(localStorage.getItem('dataUser'))["username"] || "Test"
    for (item in dataArray) {
      if(`${dataArray[item].station}`===username_){
      console.log(item)
    document.querySelector("#report_History_").innerHTML +=
    `
    <tr data-row="${item}">
    <th scope="col"> <a class="btn btn-success" href="https://firebasestorage.googleapis.com/v0/b/criminals-curse-1592081187332.appspot.com/o/stations%2F${dataArray[item].station}%2Fvideos%2F${(dataArray[item].videokey)}.mp4?alt=media">Download video</a>
    <th scope="col">${dataArray[item].Age}</th>
    <th scope="col">${dataArray[item].Email}</th>
    <th scope="col">${dataArray[item].Note}</th>
    <th scope="col">${dataArray[item].PhoneNumber}</th>
    <th scope="col">${dataArray[item].latitude}</th>
    <th scope="col">${dataArray[item].longitute}</th>
    <th scope="col">${dataArray[item].fullName}</th>
    <th scope="col"><button type="button" class="btn btn-danger" onclick="setTimeout(function(){ database.ref().child('reportHistory/'+ '${item}').remove() }, 200);
    ">Delete</button></th>

  </tr>
    `
    //'${JSON.stringify(dataArray[item]).replace(",\\")}'
  }
}
  })
</script>

</html>
