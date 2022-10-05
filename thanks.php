<?php
$firstnameErr = $lastnameErr = $emailErr = $telephoneErr = $usermessageErr = "";
$firstname = $lastname = $email = $telephone = $usermessage= "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (empty($_POST["firstname"]) || (trim($_POST['firstname']) === '' )) {
    $firstnameErr = "First name is required";
    } elseif(strlen($_POST["firstname"]) > 25){
      $firstnameErr = "Your first name must be max 25 characters";
    } elseif(strlen($_POST["firstname"]) < 2){
      $firstnameErr = "Your first name must be longer than 1 character.";
    } else {
    $firstname = clean_input($_POST["firstname"]);
    }

  if (empty($_POST["lastname"]) || (trim($_POST['lastname']) === '' )) {
  $lastnameErr = "Last name is required";
  } elseif(strlen($_POST["lastname"]) > 25){
    $lastnameErr = "Your last name must be max 25 characters";
  } elseif(strlen($_POST["lastname"]) < 2){     
    $lastnameErr = "Your last name must be longer than 1 character.";
  } else {
  $lastname = clean_input($_POST["lastname"]);
  }

  if (empty($_POST["email"]) || (trim($_POST['email']) === '' )) {
    $emailErr = "Email is required";
  } elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = clean_input($_POST["email"]);
  } else {
    $emailErr = $_POST['email'] . "is not a valid email address";
  } 

  if (empty($_POST["telephone"]) || (trim($_POST['telephone']) === '' )) {
  $telephoneErr = "Phone number is required";
  } else { 
  $telephone = clean_input($_POST["telephone"]);
  $telephone = filter_var($telephone, FILTER_SANITIZE_NUMBER_INT);
  }
  if ((strlen($telephone)) > 10 || (strlen($telephone)) < 10 ){
    $telephoneErr = "Your phone number must be 10 digits";
  } 
   

  if (empty($_POST["usermessage"]) || (trim($_POST['usermessage']) === '' )) {
    $usermessageErr = "First name is required";
    } elseif(strlen($_POST["usermessage"]) > 25000){
      $usermessageErr = "Your message must be max 25000 characters";
    } elseif(strlen($_POST["usermessage"]) < 2){
      $usermessageErr = "Your message must be longer than 1 character.";
    } else {
    $usermessage = clean_input($_POST["usermessage"]);
    }
} 
 
function clean_input($data) {
  $data = trim($data);
  $data = htmlentities($data);
  return $data;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
if (!$firstnameErr && !$lastnameErr && !$emailErr && !$telephoneErr && !$usermessageErr ) {
      echo '<div class="formbox">';
      echo "Merci " . $firstname . " " . $lastname . " de nous avoir contacté à propos de " . $_POST['subject'] . "<br>";
      echo "Un de nos conseiller vous contactera soit à l’adresse " . $email . " ou par téléphone au " . $telephone . " dans les plus brefs délais pour traiter votre demande:<br><br>";
      echo '<div class="formMsg">' . $usermessage . "</div>";
}
else {
      echo '<div class="formbox"><ul>';
      echo "<li>" . $firstnameErr . "</li>";
      echo "<li>" . $lastnameErr . "</li>";
      echo "<li>" . $emailErr . "</li>";
      echo "<li>" . $telephoneErr . "</li>";
      echo "<li>" . $usermessageErr . "</li>";
      echo "</ul></div>";
}
?>



</body>

</html>