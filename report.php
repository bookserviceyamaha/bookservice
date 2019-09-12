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
<?php include 'koneksi.php';?>
<?php $book = mysqli_query($koneksi,"SELECT * from book WHERE id=7");
    $dbook=mysqli_fetch_assoc($book);?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Yamaha Book Service</a>
  </nav>
  <h2>Booking berhasil dibuat pada tanggal <?php echo $dbook['tanggal']?> </h2>

  <h4>Nama</h4>
  <?php echo $dbook['cust_name']?>
  <h4>Alamat</h4>
  <?php echo $dbook['cust_address']?>
  <h4>Nomor HP</h4>
  <?php echo $dbook['cust_phone']?>

  <h4>Booking dilakukan pada tanggal</h4>
  <?php echo $dbook['book_date']?> pada jam <?php echo $dbook['book_time']?> WIB
<br>
  <h3>Status</h3>
  <h2><?php echo $dbook['book_status']?></h2>



