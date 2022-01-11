var database = firebase.database();
var db = firebase.firestore();
var storageRef = firebase.storage().ref();

var usernameLogin = document.getElementById("usernameLogin");
var passwordLogin = document.getElementById("passwordLogin");
document.forms[0].onsubmit = (e) => e.preventDefault()
/*
if (localStorage.getItem('dataUser') != null) {
localStorage.setItem('dataUser', 'Tom');

}
*/
function login (){
  var docRef = db.collection("stations")
  .where("username", "==", usernameLogin.value)
  .where("password", "==", passwordLogin.value).get()
      .then((querySnapshot) => {
          //console.log(querySnapshot.docs[0].data())
        localStorage.setItem('dataUser', JSON.stringify( querySnapshot.docs[0].data()) );
        // Logged
        console.log("logged");
        location.href = "homepage.php";
      })
      .catch((error) => {
         document.querySelector(".alert-is-there").hidden = !true;
      });
}

/*
  return docRef.then((doc) => {
    return doc.docs.map((v)=> v.id)
  }).catch((error) => {
      console.log("Error Can't Get IDs", error);
  });
}*/
/*
  function getDataDo(){
    getData().then(array_ => {
      if (array_.length > 0) {
        array_.forEach((item) => {
          showData(item);
        });
      }else {
         alert("Error Pasword or user isn't exeit")
      }

    })
  }
  getDataDo();

  let showData = function(id) {
    var docRef = db.collection("stations").doc(id);
  docRef.get().then((doc) => {
      console.log("data:", doc.data());
  }).catch((error) => {
      console.log("Error getting cached document:", error);
  });
  }
*/
