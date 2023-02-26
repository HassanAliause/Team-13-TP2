<?php
// including the dataabse connection file
include 'databaseConnect.php';
// checking if user has logged in or not

session_start();

$user_id = $_SESSION['id'];
// declaring the variable for the messsages
$messages = array();

if(!isset($user_id)){
   header('location: login.php');
}
if(isset($_POST['send'])){

    $fName = mysqli_real_escape_string($con, $_POST['fname']);
    $lName = mysqli_real_escape_string($con, $_POST['lname']);
    $fullName = $fName . ' ' . $lName;
    $number = $_POST['phone'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $msg = mysqli_real_escape_string($con, $_POST['message']);
    $select_message = mysqli_query($con, "SELECT * FROM `message` WHERE name = '' AND email = '$email' And subject = '$subject' AND number = '$number' AND message = '$msg'") or die('query failed');
 
    if(mysqli_num_rows($select_message) > 0){
       $messages['successful'] = 'Message sent already!';
    }else{
       mysqli_query($con, "INSERT INTO `message`(user_id, name, email, number, subject, message) VALUES('$user_id', '$fullName', '$email', '$number','$subject' , '$msg')") or die('query failed');
       $messages['unsuccessful'] = 'Message sent successfully!';
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
            <form class="form input">
                <div class="titleh3">
                    <h3>For any queries, please fill out this form and we will contact you back within 24 hours.</h3>
                </div>
                <label>First Name</label>
                <input type="text" name="fname" placeholder="First name" required>
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last name" required>
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter a valid email address" required>
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required>
                <label>Message</label>
                <textarea rows="10" name="message" placeholder="Write your message"></textarea>
                <div class="center">
                    <button type="submit" name="send" >Submit</button>
                </div>
                <?php
                foreach($messages as $message) {
                  echo '<p class="error"  >' . $message . '</p><br>';
                }
              ?>
            </form>
           </div>
        </div>
        <h2 style="text-align:center; padding:30px;">ABOUT US</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="container-about">
                    <p style="text-align:center">We are the founders of TH13TEENBIT, we sell a variety of technology products. TH13EENBIT only started couple years ago, since Covid-19.<br>
Since covid-19 has hit the UK, we have noticed the demand for computers and its accessories has been increased. This was because most of the population started to work/study/play from home.
Therefore we've decided to open an online technology store.<br>
As the store is getting well known by users, we've decided to enlarge our business by selling gaming computers, gaming accessories and and other products for streamers. <br>
Our vision is to sell high-quality technology products at an affordable price, so young adults won't have to spend loads of money. We offer great deals for both new and existing customers.   
We are open 24/7 and always available to help our customers.
</p>
                    </div>
                </div>
            </div>
    </body>
    
    <!-- footer -->
<?php include_once "footer.php"?>

</html>