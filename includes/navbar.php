<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">

      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homepage.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="suspects.php"><i class="fas fa-bell"></i> Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="control.php"><i class="fas fa-cog"></i> Control Panel</a>
        </li>

      </ul>



    </div>
  </div>
  <script>
  if (localStorage.getItem('dataUser') != null) {
  document.querySelector("[data-username]").innerText = JSON.parse(localStorage.getItem('dataUser'))["username"]
  /*document.querySelector("[data-logout]").addEventListener("click",
  function() {
    localStorage.removeItem('dataUser');
    location.href = location.pathname.replace(/[^\/]+(?=\/$|$)/, "");

  }
)*/
  }

  </script>
</nav>
