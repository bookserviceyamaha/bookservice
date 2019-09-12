<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// menangkap data yang dikirim dari form
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
$approve = $_POST['selected'];
session_start();
include 'koneksi.php';
// menangkap data yang dikirim dari form
foreach($approve as $id){
    $book = mysqli_query($koneksi,"SELECT * from book WHERE id=".$id);
    $dbook=mysqli_fetch_assoc($book);
    $name = $dbook['cust_name'];
    $email = $dbook['cust_email'];
    $address = $dbook['cust_address'];
    $book_date = $dbook['book_date'];
    $book_time = $dbook['book_time'];
    $book_status = 'Approved';
    $tanggal = $dbook['tanggal'];
    $phone = $dbook['cust_phone'];
    $approval = $_SESSION['username'];
    $sql = "UPDATE book SET book_status ='Approved'WHERE id= ".$id;
    if (mysqli_query($koneksi, $sql)) {
        echo "New record created successfully";
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
    //Server settings
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->Host       = 'ssl://smtp.gmail.com:465';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'aligia97@gmail.com';
            $mail->Password   = 'aligia090897';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

    //Recipients
            $mail->setFrom('aligia97@gmail.com','Yamaha');
    $mail->addAddress($email,$name);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Antrian disetujui';
    $mail->Body    = '
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Yamaha Book Service
        <div class="logo-image">
            <img src="https://cdn.cycletrader.com/makes/make-yamaha.png" class="img-fluid">
      </div> 
    </a>
    </nav>
    <h2>Booking berhasil dibuat pada tanggal '.$tanggal.' </h2>

    <h4>Nama</h4>
    '.$name.'
    <h4>Alamat</h4>
    '.$address.'
    <h4>Nomor HP</h4>
    '.$phone.'

    <h4>Booking dilakukan pada tanggal</h4>
    '.$book_date.' pada jam '.$book_time.' WIB
    <br>
    <h3>Status</h3>
    <h2>'.$book_status.'</h2>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
}


