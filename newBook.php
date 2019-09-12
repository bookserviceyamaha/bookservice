<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
session_start();
include 'koneksi.php';
// menangkap data yang dikirim dari form
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$book_date = date("d-m-Y",strtotime($_POST['date']));
$book_time = $_POST['time'];
$book_status = 'Pending';
$phone = $_POST['phone'];

$sql = "INSERT INTO book (cust_name,cust_email,cust_address,book_date,book_time,book_status,cust_phone) VALUES 
('".$name."','".$email."','".$address."','".$book_date."','".$book_time."','".$book_status."','".$phone."')";
// menangkap data yang dikirim dari form
if (mysqli_query($koneksi, $sql)) {
	echo "New record created successfully";
	header("location:index.php");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

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
    $mail->Subject = 'Antrian';
    $mail->Body    = '
    <div style="font-family: Helvetica, Arial, sans-serif;width:100%!important;min-height:100%;font-size:14px;color:#404040;margin:0;padding:0;">
    
    <table style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0;">
    <tbody>
    <tr style="margin:0;padding:0">
    <td style="margin:0;padding:0">
    <td> 
    	<img src="https://cdn.cycletrader.com/makes/make-yamaha.png" class="img-fluid">
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Yamaha Book Service</a>
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
    header("location:index.php");
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}