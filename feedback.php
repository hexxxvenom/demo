<?php

  // code for insert the feedback
  if(isset($_POST['send']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $msg=$_POST['message'];

    include 'connection.php';
    $qry_insert=mysqli_query($con,"INSERT INTO `user_feedback`(`f_id`, `name`, `email`,`subject`, `msg`) VALUES ('','$name','$email','$subject','$msg')");
    if ($qry_insert) 
    {
      echo "<script>
        alert('Thank you ".$name." for writing the feedback.');
          window.location='feedback.php';
      </script>";
    }
    else
    {
      echo "<script>
        alert('Failed');
        window.location='feedback.php';
      </script>";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>


</head>
<body>
<?php
  include('header.php');

?>

<br><br>
<h3 class="w3_heade_tittle_agile" style="color: red;font-size: 30px">FEEDBACK</h3>
  <div class="book-appointment" style="width: 1200px;margin: auto;padding: 50px 50px">
    <form action="#" method="post">
      <div class="gaps">
        <p>NAME</p>  
          <input type="text" name="name" pattern="[a-z A-Z]+" title="Only Letters"  required="">  
      </div>
      <div class="gaps">
        <p>EMAIL</p>  
          <input type="email" name="email"   required="">  
      </div>
      <div class="gaps">
        <p>SUBJECT</p> 
          <input type="text" name="subject" maxlength="100" required="" />
      </div>
      <div class="gaps">
        <p>MESSAGE</p> 
          <textarea style="height: 10%;" cols="30"  rows="5" name="message" maxlength="600" required=""></textarea>
      </div>
      
      <div class="clearfix"></div>
        <input type="submit" value="SEND MESSAGE" name="send">
    </form>
  </div><br><br>
</body>
</html>