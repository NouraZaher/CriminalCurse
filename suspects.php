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
        <h4 style="color: white;"> Reports: </h4>
      </div>
      <div class="col-md-auto">
      </div>
      <div class="col col-lg-2">
        <a type="button" name="button" class="btn btn-warning" href="bin.php">History</a>
      </div>
    </div>
  </div>

<br>
<div class="card card-primary card-outline">
<table class="table">
<thead>
  <tr>
    <th scope="col">video</th>

    <th scope="col">Age</th>
    <th scope="col">Email</th>
    <th scope="col">Note</th>
    <th scope="col">Phone Number</th>
    <th scope="col">Latitude</th>
    <th scope="col">Longitute</th>
    <th scope="col">Full Name</th>
    <th scope="col">Move to Bin</th>

  </tr>
</thead>
<tbody id="report_">

</tbody>
</table>
</div>
</div>




<?php include 'includes/config/config.php'; ?>
<script src="includes/js/FFunctions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
<script>
  var res_readData = firebase.database().ref('Reports/');
  res_readData.on('value', (snapshot) => {
    const data = snapshot.val();
    let dataArray = data;
    document.querySelector("#report_").innerHTML = "";
    let username_ = JSON.parse(localStorage.getItem('dataUser'))["username"] || "Test"
      for (item in dataArray) {
        if(`${dataArray[item].station}`===username_){
        console.log(item)
      document.querySelector("#report_").innerHTML +=
      `
      <tr data-row="${item}">
      <th scope="col"> <a class="btn btn-success" href="https://firebasestorage.googleapis.com/v0/b/criminals-curse-1592081187332.appspot.com/o/stations%2F${dataArray[item].station}%2Fvideos%2F${(dataArray[item].videokey)}.mp4?alt=media">Download video</a>
      <th scope="col">${dataArray[item].age}</th>
      <th scope="col">${dataArray[item].email}</th>
      <th scope="col">${dataArray[item].additional_notes}</th>
      <th scope="col">${dataArray[item].phone_no}</th>
      <th scope="col">${dataArray[item].latitude}</th>
      <th scope="col">${dataArray[item].longitude}</th>
      <th scope="col">${dataArray[item].full_name}</th>
      <th scope="col"><button type="button" class="btn btn-danger" onclick="move_toBin('${item}');

      ">Move</button></th>

    </tr>
      `
      //'${JSON.stringify(dataArray[item]).replace(",\\")}'
    }
  }
});
    function move_toBin(item){
      var res_readData = firebase.database().ref('Reports/');
      res_readData.on('value', (snapshot) => {
        const data = snapshot.val();
        let dataArray = data;
      firebase.database().ref('reportHistory/' + `${item}`).set({
      videokey: `${dataArray[item].videokey}`,
      Age: `${dataArray[item].age}`,
      Email: `${dataArray[item].email}`,
      Note: `${dataArray[item].additional_notes}`,
      PhoneNumber: `${dataArray[item].phone_no}`,
      latitude: `${dataArray[item].latitude}`,
      longitute: `${dataArray[item].longitude}`,
      fullName: `${dataArray[item].full_name}`,
      station: `${dataArray[item].station}`
      });
    });
      setTimeout(function(){ database.ref().child('Reports/'+ `${item}`).remove() }, 500);


    }
  </script>

</html>
