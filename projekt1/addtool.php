<?php
// Hjälp funktioner

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function swedishdays($dayname) {
  if ($dayname == "Monday"){$swename = ("Måndag"); return $swename;}
  if ($dayname == "Tuesday"){$swename = ("Tisdag"); return $swename;}
  if ($dayname == "Wednesday"){$swename = ("Onsdag"); return $swename;}
  if ($dayname == "Thursday"){$swename = ("Torsdag"); return $swename;}
  if ($dayname == "Friday"){$swename = ("Fredag"); return $swename;}
  if ($dayname == "Saturday"){$swename = ("Lördag"); return $swename;}
  if ($dayname == "Sunday"){$swename = ("Söndag"); return $swename;}
}
function yearextract($number){
  $yearbase = (int) $number;
  $Yremainder = ($yearbase % 31536000);
  $remainderfree = ($yearbase - $Yremainder);
  $years = round($remainderfree / 31536000);
  return $years;
}
function daysextract($number){
  $daybase = (int) $number;
  $Dremainder = ($daybase % 86400);
  $Dremainderfree = ($daybase - $Dremainder);
  $days = round($Dremainderfree / 86400);

  $hourbase = ($daybase - $Dremainderfree);
  $Hremainder = ($hourbase % 3600);
  $Hremainderfree = ($hourbase - $Hremainder);
  $hours = round($Hremainderfree / 3600);

  $minutebase = ($hourbase - $Hremainderfree);
  $Mremainder = ($minutebase % 60);
  $Mremainderfree = ($minutebase - $Mremainder);
  $minutes = round($Mremainderfree / 60);

  $seconds = ($minutebase - $Mremainderfree);

  return strval($days ." dagar " .$hours ." timmar " .$minutes . " minuter och " .$seconds ." sekunder");
}



/* function spamcheck($field)
  {
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  
  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
if (isset($_REQUEST['email']))
  {//if "email" is filled out, proceed
  //check if the email address is invalid
  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE)
    {
    echo "Invalid input";
    }
  else
    {//send email
    $email = $_REQUEST['email'] ; 
    $subject = $_REQUEST['subject'] ;
    $message = $_REQUEST['message'] ;
    mail("someone@example.com", "Subject: $subject",
    $message, "From: $email" );
    echo "Bra jobbat, du har fått ett email med ett random password!";
    }
  }
else
  {
  echo "<form action='index.php' method='get'>
  <p>Användarnamn: <input type='text' name='username' /></p>
  <p>E-mail: <input type='text' name='email' /></p>
  <p><input type='submit' value='Registrera dig'/></p>
  </form>";
  } */
?>