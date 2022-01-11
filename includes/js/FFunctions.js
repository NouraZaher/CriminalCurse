
var database = firebase.database();
var db = firebase.firestore();
var storageRef = firebase.storage().ref();

db.settings({ timestampsInSnapshots: true });
//const firebase = require("firebase");
//require("firebase/firestore");
var starCountRef = database.ref().child('users');
starCountRef.on('value', (snapshot) => {
  const data = snapshot.val();
});



var addusername = document.getElementById("addusername");
var addpassword = document.getElementById("addpassword");


var chat = document.getElementById("chat");
var addmodusername = document.getElementById("addmodusername");
var addmodpassword = document.getElementById("addmodpassword");

function addUser(){
    let username_ = JSON.parse(localStorage.getItem('dataUser'))["username"] || "Test"
  firebase.database().ref('Users/' + addusername.value).set({
    presence: 'offline',
    station: username_
  });

  db.collection("users").add({
      password: addpassword.value,
      station: username_,
      username: addusername.value
  })
  .then(() => {
      console.log("Document successfully written!");
  })
  .catch((error) => {
      console.error("Error writing document: ", error);
 });
  //window.alert(addusername.value +" successfully added");
  let temp = `
  <div class="alert alert-success col-6 m-auto mb-3 alert-dismissible fade show" role="alert">
  <strong>${addusername.value}</strong> successfully added!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>`
  document.querySelector("center").insertAdjacentHTML("beforebegin", temp);
  //console.log(addusername.value)
  //location.reload()
}

function addStation(){
  db.collection("stations").add({
      password: addmodpassword.value,
      chat: chat.value,
      username: addmodusername.value
  })
  .then(() => {
      console.log("Document successfully written!");
  })
  .catch((error) => {
      console.error("Error writing document: ", error);
 });
 let temp = `
 <div class="alert alert-success col-6 m-auto mb-3 alert-dismissible fade show" role="alert">
 <strong>${addmodusername.value}</strong> successfully added!
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>`
 document.querySelector("center").insertAdjacentHTML("beforebegin", temp);
}


function getUserData() {
  firebase.database().ref('Users/'+addusername.value).once('value').then(function (snapshot){
  })
}




/*const userList2 = document.querySelector('#usertablelist');


  var tbody = document.getElementById('usertablelist');
  var trow = document.createElement('tr');
  var td1 = document.createElement('td');
  var td2 = document.createElement('td');
  var td3 = document.createElement('td');
  var td4 = document.createElement('td');
  /*let cross = document.createElement('a');
  cross.classList.add('link-danger');
  var deleteuser = doc.data().username;


  trow.setAttribute('data-id', doc.id);
  var docRef = db.collection("users").doc(id)..get().then((doc) => {
  var username = doc.data().username;
  var station = doc.data().station;
}
  td1.innerHTML = username;
  td2.innerHTML = station;
  td3.innerHTML = 'username';
  td4.innerHTML = 'username';

  trow.appendChild(td1);
  trow.appendChild(td2);
  trow.appendChild(td3);
  trow.appendChild(td4);
  tbody.appendChild(trow);

  cross.addEventListener('click', (e) => {
    e.stopPropagation();
    let id = e.target.parentElement.getAttribute('data-id');
    db.collection('users').doc(id).delete();
    database.ref().child('users/'+deleteuser).remove();
  })*/





/*db.collection('users').get().then((snapshot) => {
  snapshot.docs.forEach(doc => {
  usertable(doc);
  })
})*/



//database.ref().child('users').set('hello');
//database.ref().remove()
//database.ref().child('users').set('hello');
