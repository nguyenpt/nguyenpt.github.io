<?php

    if ($_POST["submit"])
    {

      if (!$_POST['fname']) {
        $error="<br />Please enter your first name";
      }
      if (!$_POST['lname']) {
        $error.="<br />Please enter your last name";
      }

      $correctInfo=0; //all correct info at 3
      if (!$_POST["email"]){
        $error.="<br />Please enter your email";

      }


      //email validation
      if ($_POST['email'] != "" AND !filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)){
        $error.="<br />Please enter a valid email address";
      }
      else {
        $emailTo=$_POST["email"];
        $correctInfo++;
      }

      if ($_POST["subject"]){
          $subject=$_POST["subject"];
          $correctInfo++;
      }
      if (!$_POST["comment"]){
        $error="<br />Please enter a comment";
      }
      else {
        $body=$_POST["comment"];
        $correctInfo++;
      }



      $result='<div class="alert alert-success">Form submitted</div>';

      if ($error) {
        $result = '<div class="alert alert-danger"><strong>There were error(s) in submitting the form: '.$error.'</strong></div>';
      }
      else {
          if (mail("qwertyowns123@hotmail.com", "Comment from website!", "Name: ".$_POST[fname]." ".$_POST[lname]."

          Email: ".$_POST['email']."
          Telephone : ".$_POST['phone']."
          Comment: ".$_POST['comment'])){

            $result='<div class="alert alert-success">Thank you! We\'ll be in touch.</div>';
          }
          else {
            $result='<div class="alert alert-danger">There was an error sending your message. Please try again later.</div>';
          }
        }
      }





?>

<!doctype html>
<html lang="en">
  <head>
   <title>Win Design Solutions</title>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="author" content="Phong Nguyen">
   <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="description" content="Design with a plan" />

      <!--Bootstrap -->
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="main.css">

      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <style>
    .jumbotron {
      background-image:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("images/banner.jpg");
      color:white;
      background-repeat: no-repeat;
      background-size: cover;
    }
    .container {
      width:600px;
      margin:0 auto;
      font-family: helvetica;
      font-size:1.2em;
    }
    .item {
      height:400px;
    }
    .navbar-nav {
      float:right;
    }
    .footer_wrapper {
      border-top: 1px solid #FFFFFF;
      background-color:#222222;
    }
    input {
       padding: 7px;
       border-radius:5px;
       width: 300px;
       height: 30px;
       font-size:1.2em;
       border: 1px solid grey;
       margin-bottom:10px;
     }
    #message {
       width:600px;
       height:120px;
     }
     label {
       width:200px;
       float:left;
       padding-top:10px;
     }
     #submitButton {
       height:50px;
       width:100px;
       margin-left:200px;
       color:white;
     }
     #error {
       color:red;
       margin:20px;
       font-weight:bold;
     }
  </style>

  </head>

  <body>


    <br><br><br>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Win Design</a>
        </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.html"><span class="glyphicon glyphicon-home"></span>Home</a></li>
              <li><a href="#">Portfolio</a></li>
              <li><a href="#">Web Design</a></li>
              <li><a href="About.html">About</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-envelope"></span>Contact</a></li>
            </ul>
            </div>

        </div>
    </nav>

    <div class="jumbotron">
      <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <h2>Contact Me</h2>
          <?php echo $result; ?>




          <form method="post" id="contactForm">

            <div class="form-group">
              <label for="fname">First Name*</label>
              <input type="text" name="fname" id="fname"  class="form-control" placeholder="Your first name"
              value="<?php echo $_POST['fname']; ?>" />
            </div>

            <div class="form-group">
              <label for="lname">Last Name*</label>
              <input type="text" name="lname" id="lname" class="form-control" placeholder="Your last name"
              value="<?php echo $_POST['lname']; ?>" />
            </div>

            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" name="email" id="email"  class="form-control" placeholder="Your email"
              value="<?php echo $_POST['email']; ?>" />
            </div>

            <div class="form-group">
              <label for="phone">Telephone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Your phone number"
              value="<?php echo $_POST['phone']; ?>" />
            </div>

            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject"
              value="<?php echo $_POST['subject']; ?>"/>
            </div>

            <div class="form-group">
              <label for="comment">Your Message</label>
              <textarea class="form-control" name="comment" id="message" placeholder="Type message here">
            <?php echo $_POST['comment']; ?> </textarea>
            </div>

            <input id="submitButton" name="submit" type="submit" class="btn btn-success btn-lg" value="Submit" />


          </form>

        </div>
      </div>
    </div>



    <div class="footer_wrapper">
      <div class="container">
        <div class="footer">
          <div class="footer_content">
              <ul class="nav navbar-nav">
                  <li><a href="index.html">Home</a></li>
                  <li><a href="#">Portfolio</a></li>
                  <li><a href="#">Web Desigh</a></li>
                  <li><a href="About.html">About</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">Contact</a></li>
              </ul>

              <div class="col-xs-12 col-sm-3">
                <ul>
                  <li><a href="https://www.linkedin.com/pub/phong-nguyen/104/b97/626">

          <img src="https://static.licdn.com/scds/common/u/img/webpromo/btn_liprofile_blue_80x15.png" width="80" height="15" border="0" alt="View Phong Nguyen's profile on LinkedIn">

    </a></li>
                  <li><a href="https://twitter.com/nguyenptech" class="twitter-follow-button" data-show-count="false">Follow @nguyenptech</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
                  <li><a target="_blank" title="find us on Facebook" href="http://www.facebook.com/ptechwin"><img alt="follow me on facebook"
                    src="images/fbicon.png" border=0></a>></li>
                </ul>

              </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
