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
    Add Moderator
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" >User addition</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


      <form class="">
        <div class="modal-body">

            <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Mod Username:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="addmodusername">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mod Password:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="addmodpassword">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label" >chat:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="chat">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="location.reload();" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="addStation()">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</center>

<div class="container">

<h4 style="color: white"> Mod list: </h4>
<!--
table
-->
<div class="card card-primary card-outline">
<table class="table">
<thead>
  <tr>
    <th scope="col">Mod Username</th>
    <th scope="col">Mod chat</th>
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
  var docRef = db.collection("stations").get();
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
  var docRef = db.collection("stations").doc(id);

docRef.get().then((doc) => {

    console.log("data:", doc.data());
    let tr_ = document.createElement('tr');
    let templet = `
      <td>${doc.data().username}</td>
      <td>${doc.data().chat}</td>
      <td><button class="btn btn-danger" onclick="delete_('${id}', this)" >Delete</button></td>
    `
    tr_.innerHTML = templet;
    document.querySelector("#users_").appendChild(tr_);
}).catch((error) => {
    console.log("Error getting cached document:", error);
});


}

let delete_ = function(_id, e) {
  console.log(e.parentElement.parentElement.remove());
  db.collection("stations").doc(_id).delete().then(() => {
    console.log("Document successfully deleted!");
}).catch((error) => {
    console.error("Error removing document: ", error);
});
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
