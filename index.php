<?php include 'koneksi.php';?>
<?php include 'templates/header.php';?>
<div class="container">
	<div class="jumbotron">
    <div class="container">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img style=""class="d-block w-100" src="..." alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <form action="newBook.php" method="post" onSubmit="return validasi()">
        <fieldset>
          <legend>Book</legend>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Default input" id="inputDefault">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Address</label>
            <input type="text" name ="address" class="form-control" placeholder="Default input" id="inputDefault">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Phone Number</label>
            <input type="text" name ="phone" class="form-control" placeholder="Default input" id="inputDefault">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Date and Time Booking</label>
            <div class='input-group date' id='datetimepicker5'>
              <input type='date' name="date" date-date-format="DD MMM YYYY"class="form-control" />
              <input type='time' name="time" class="form-control" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function () {
      $('#datetimepicker5').datetimepicker({
        defaultDate: "11/1/2013",
        disabledDates: [
        moment("12/25/2013"),
        new Date(2013, 11 - 1, 21),
        "11/22/2013 00:53"
        ]
      });
    });
  </script>
  <?php include 'templates/footer.php';?>
