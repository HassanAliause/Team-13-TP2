
<?php
include 'databaseConnect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}
?>
<?php
// including the dataabse connection file
include 'databaseConnect.php';

// declaring the variable for the messsages
$messages = array();

if(isset($_POST['send'])){

    $fName = mysqli_real_escape_string($con, $_POST['fname']);
    $lName = mysqli_real_escape_string($con, $_POST['lname']);
    $number = $_POST['phone'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $msg = mysqli_real_escape_string($con, $_POST['message']);
    $select_message = mysqli_query($con, "SELECT * FROM `message` WHERE fName = '' AND lName = ''  AND email = '$email' AND subject = '$subject' AND phone = '$number' AND message = '$msg'") or die('query failed');
 
    if(mysqli_num_rows($select_message) > 0){
       $messages['unsuccessful'] = 'Message sent already!';
    }else{
       mysqli_query($con, "INSERT INTO `message`( fName, lName, phone, email, subject, message) VALUES( '$fName', '$lName', '$number' ,'$email' ,'$subject' , '$msg')") or die('query failed');
       $messages['successful'] = 'Message sent successfully!';
    }
 
 }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel="stylesheet" href="../CSS/contactus.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <!-- navbar -->
        <?php include_once "header.php"?>
        <div class="contact-header">
            <h2>CONTACT US</h2>
        </div>
        <div class="container">
            <div class="container-box">
            <form class="form input" action="contactus.php" method="POST">
                <div class="titleh3">
                    <h3>For any queries, please fill out this form and we will contact you back within 24 hours.</h3>
                </div>
                <label>First Name</label>
                <input type="text" name="fname" placeholder="First name" required>
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last name" required>
                <label>Phone Number</label>
                <input type="number" name="phone" placeholder="Phone Number" pattern="^\+(44)[1-9]\d{8,9}$" required>
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter a valid email address" required>
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required>
                <label>Message</label>
                <textarea rows="10" name="message" placeholder="Write your message"></textarea>
                <div class="center">
                    <button type="submit" name="send" onclick="myFunction()" >Submit</button>
                    <script>
                        function myFunction() {
                            let text;
                            if (confirm("Form Submitted!") == true) {
                                text = "Submitted! We will contact you back!";
                            } else {
                               text = "Done!"
                            }
                        }
                    </script>
                </div>
                <?php
                foreach($messages as $message) {
                  echo '<p class="message"  >' . $message . '</p><br>';
                }
              ?>
            </form>
           </div>
        </div>
                    </div>
                </div>
            </div>
    </body>
    
    <!-- footer -->
<?php include_once "footer.php"?>

</html>