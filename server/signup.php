<?php 
    session_start();
    include("dbconnect.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    //Load composer's autoloader
    require '../vendor/autoload.php';

   
    $username = $_POST['signup_username'];
    $password = $_POST['signup_password'];
    $confirm_pass = $_POST['password_confirmation'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];

    if($confirm_pass == $password) {
        $result = mysqli_query($dbhandle, "select * from users where UserName = '$username'")
            or die("Failed to connect database ");

        $row = mysqli_fetch_array($result);
        if($row['UserName'] == $username) {
            
            header("Location: ../signup.html");
        }
        else {
            $action = mysqli_query($dbhandle, "INSERT INTO users (`UserName`, `Password`, `Email`, `fname`, `lname`) VALUES ('$username', '$password', '$email', '$firstname', '$lastname')");
            $_SESSION['userID'] = $username;        
            if($action){
                    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                    try {
                        //Server settings
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->isHTML();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Username = "tranvanteo1111";                 // SMTP username
                        $mail->Password = "@ManhDuc";                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to
                    
                        //Recipients
                        $mail->setFrom('maichungtuan@gmail.com', 'Admin');
                        $mail->addAddress($email);     // Add a recipient
                    
                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Verification';
                        $mail->Body    = '<b>Please click here to go back to home page: </b><a href="http://localhost/cs4443/home.html">Home</a>';
                    
                        $mail->send();
                        echo 'Please check your email for verification.';
                    } catch (Exception $e) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    }
            }

        }
    } else {
        header("Location: ../signup.html");
    }
?>