<?php include 'koneksi.php';?>
<?php include 'templates/header.php';?>
<?php $book = mysqli_query($koneksi,"SELECT * from book"); ?>
<div class="container">
	<div class="jumbotron">
    <div class="container">
     <div class="table-container" style="overflow:auto;">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Date Booking</th>
            <th scope="col">Time Booking</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <form action="approve.php" method="post" onSubmit="return validasi()">
            <?php
            $a=1;
            while($dbook=mysqli_fetch_assoc($book)){
              echo "<tr class='table-secondary'>";
              echo "<td>".$a."</td>";
              echo "<td>".$dbook['cust_name']."</td>";
              echo "<td>".$dbook['cust_address']."</td>";
              echo "<td>".$dbook['cust_email']."</td>";
              echo "<td>".$dbook['book_date']."</td>";
              echo "<td>".$dbook['book_time']."</td>";
              echo "<td>".$dbook['book_status']."</td>";
              echo "<td>";
              if($dbook['book_status'] != 'Approved')
                echo "<input type='checkbox' name='selected[]' value='".$dbook['id']."'>";
              echo "<td>";
            echo "</tr>";
            $a+=1;
          }
          ?>
          <td><button type="submit" class="btn btn-primary">Approve</button></td>
        </form>
      </tbody>
    </table> 
  </div>
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
