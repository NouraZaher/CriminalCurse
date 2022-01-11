<?php include 'includes/head.php';?>

<style media="screen">
body{
  background-image: url("images/prison-doors.jpg");
}
</style>

  <body>
<?php include 'includes/navbar.php';?>
<br>
<center>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add User
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User addition</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


      <form class="">
        <div class="modal-body">

            <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Username:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="addusername">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="addpassword">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="location.reload();" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="addUser()">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</center>

<div class="container">

<h4 style="color: white"> User list: </h4>
<!--
table
-->
<div class="card card-primary card-outline">
<table class="table">
<thead>
  <tr>
    <th scope="col">Username</th>
    <th scope="col">Station</th>
<th scope="col">delete</th>

  </tr>
</thead>
<tbody id="users_">

</tbody>
</table>
</div>
<!--
table
-->
<form id="add-user-form">
  <ul class="list-group list-group-horizontal" id="user-list"></ul>
</form>
</div>


<?php include 'includes/config/config.php'; ?>

<script src="includes/js/FFunctions.js"></script>
<script type="text/javascript">


let getData = function(){
  var docRef = db.collection("users").get();
return docRef.then((doc) => {

    return doc.docs.map((v)=> v.id);
}).catch((error) => {
    console.log("Error Can't Get IDs", error);
});
}
function getDataDo(){
  getData().then(array_ => {
    array_.forEach((item) => {
      showData(item);
    });
  })
}
getDataDo();

let showData = function(id) {
  var docRef = db.collection("users").doc(id);

docRef.get().then((doc) => {
  let username_ = JSON.parse(localStorage.getItem('dataUser'))["username"] || "Test"
if(`${doc.data().station}`=== username_){
    console.log("data:", doc.data());
    let tr_ = document.createElement('tr');
    let templet = `
      <td>${doc.data().username}</td>
      <td>${doc.data().station}</td>
      <td><button class="btn btn-danger" onclick="delete_('${id}', this, database.ref().child('users/'+ '${doc.data().username}').remove())" >Delete</button></td>
    `
    tr_.innerHTML = templet;
    document.querySelector("#users_").appendChild(tr_);
  }
}).catch((error) => {
    console.log("Error getting cached document:", error);
});

}

let delete_ = function(_id, e) {
  console.log(e.parentElement.parentElement.remove());
  db.collection("users").doc(_id).delete().then(() => {
    console.log("Document successfully deleted!");
}).catch((error) => {
    console.error("Error removing document: ", error);
});
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
