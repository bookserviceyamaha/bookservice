<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php session_start();?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
  <script src="resources/js/jquery-3.4.1.min.js"></script>
  <script src="resources/js/bootstrap.min.js"></script>
  <script src="resources/js/mdb.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Yamaha Book Service</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
     <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION['status'])):?>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listbook.php">Book List</a>
        </li>
        <?php else:?>
           <li class="nav-item">
        </li>
      <?php endif;?>
      </ul>
      <?php if(!isset($_SESSION['status'])):?>
        <form class="form-inline my-2 my-lg-0">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Login
          </button>
        </form>
        <?php else:?>
          <form class="form-inline my-2 my-lg-0" action="logout.php" method="post" onSubmit="return validasi()">
            <button type="submit" class="btn btn-danger">Logout</button>
          </form>
      <?php endif;?>
    </div>
  </nav>

<!-- MODAL -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="cek_login.php" method="post" onSubmit="return validasi()">
           <div class="form-group">
            <label class="col-form-label" for="inputDefault">Username</label>
            <input type="text" name ="username" id="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name ="password" id="password" class="form-control" placeholder="Password">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Login</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>



