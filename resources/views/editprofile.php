<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body >
<nav class="navbar navbar-expand-lg  navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">Bangunrumah.id</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Testimonials</a>
        </li>
      </ul>
<br><br><br>
    </div>
  </div>
</nav>

  
    <div class="card" style="width: 30rem; margin-left: auto; margin-right: auto; margin-top: 6%; background-color:lightsteelblue ">
    <div class="card-body" style="margin-left: 50px; margin-right: 50px;">
    <br>
    <h3 class="card-title" style="text-align: center;" >Register</h3>
    <div class="dropdown-divider"></div><br>
    <form action="proses_register.php" method="post">
    <div class="form-group">
    <input type="text" class="form-control" name="nama" id="InputName1" placeholder="Name">
    </div>

    <div class="form-group">
    <input type="email" class="form-control" name="email" id="InputEmail1" aria-describedby="emailHelp" placeholder="E-mail Address">
    </div>
    
    <div class="form-group">
    <input type="number" class="form-control" name="hp" id="InputHp1" placeholder="Phone Number">
    </div>
    
    <div class="form-group">
    <input type="password" class="form-control" name="password1" id="InputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="disabledSelect" class="form-label">Role</label>
      <select id="disabledSelect" class="form-select">
        <option>Architect</option>
        <option>Builder</option>
        <option>Designer</option>
        <option>User</option>
      </select>
    </div>

    
    <div align="center">
    <button type="submit" class="btn btn-success">Register</button>
    </div>
    </form><br>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>