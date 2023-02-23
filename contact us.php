<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel="stylesheet" href="contactus.css">
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
                <input type="text" name="name" placeholder="First name" required>
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last name" required>
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter a valid email address" required>
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject" required>
                <label>Message</label>
                <textarea rows="10" placeholder="Write your message"></textarea>
                <div class="center">
                    <button type="submit">Submit</button>
                </div>
            </form>
           </div>
        </div>       
    </body>
</html>