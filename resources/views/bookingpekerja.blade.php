<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>Booking: pekerja</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#F0F8FF">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/Untitled-44.png" style="max-height: 45px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="background-color:lightgray">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="#">My Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Buildings</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">About Us</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Booking
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Architect</a></li>
            <li><a class="dropdown-item" href="#">Desaign Interior</a></li>
            <li><a class="dropdown-item" href="#">Renovation</a></li>
          </ul>
        </li>
        <li class="nav-item ml-auto">
          <a class="nav-link" href="#">Testimonials</a>
        </li>
        <span class="fa-stack">
          <i class="fa fa-user fa-stack-1x"></i>
          <i class="fa fa-circle-o fa-stack-2x"></i>
        </span>
      </ul>

    </div>
  </div>
</nav>
    
    <div class="jumbotron" style="background-image:url('img/pekerja.jpg')">
    <h1 style="color:white;text-align:center;font-family:helvetica">Booking Our Workers!</h1>
    <p style="color:white;text-align:center;font-family:helvetica">Your can start searching by filtering about your main interest home design, home style, </p>
    <p style="color:white;text-align:center">and many more so we can offer the best option for you.</p>

    </div>

    <div class="container">
    <div class="dropdown" style="text-align: right;">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #4D6AB0">
    Sort
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: #4D6AB0">
    <li><a class="dropdown-item" href="#">Most Viewed</a></li>
    <li><a class="dropdown-item" href="#">Higher Stars</a></li>
    <li><a class="dropdown-item" href="#">Lower Stars</a></li>
    <li><a class="dropdown-item" href="#">Project Build</a></li>
  </ul>
</div>
    </div>
<br>

    <div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card " style="width: 18rem;background-color:#DAD392;border-radius: 10px;margin-left:25px">
                <div class="card-body">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="background-color:lightgray">

                </form>
                <br>
                    <p>Filter</p>
                    <hr style="height:3px">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Jakarta
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Bandung
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Palembang
                        </label>
                        </div>
                    </div>
            </div>

        </div>
        <div class="card mb-3" style="max-width: 540px; margin-right:20px; background-color:#DAD392">
            <div class="row g-0">
                <div class="col-md-4">
                <br>
                <img src="img/workers.jpeg" style="width:180px;height:180px">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                <br>
                    <h5 class="card-title">PT Indonesia Maju</h5>
                    <p>
                    <i class="fas fa-map-marker-alt"></i>  Jl. Nusa Kembang </p>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <br><br>
                    <div class="d-grid gap-2 col-6 mx-auto" style="background-color: #BBA040;">
                    <button class="btn btn" type="button">Contact</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        

    </div>
    </div>

<br><br><br>




     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html> 