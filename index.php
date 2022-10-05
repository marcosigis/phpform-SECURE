<?php
    $initialValues = [
        "firstname" => [
            "label" => "First Name",
            "placeholder" => "Your name goes here",
        ], 
        "lastname" => [
            "label" => "Last Name",
            "placeholder" => "Your last name goes here",
        ],
    ];
    
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


    <div class="formbox">

        <form class="form" action="/thanks.php" method="post">
            <div>
                <label for="firstname"></label><br>
                <input id="firstname" type="text" name="firstname" placeholder="First name" pattern="[a-z]{1-25}"/>
            
            </div>
            <div>
                <label for="lastname"></label><br>
                <input id="lastname" type="text" class="border-bottom-input" name="lastname" placeholder="Last name" pattern="[a-z]{1-25}"/>
            </div>
             <div>
                <label for="email"></label><br>
                <input id="email" type="text" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
            </div>
            
            <div>
                <label for="telephone"></label><br>
                <input id="telephone" type="tel" name="telephone" placeholder="Telephone: +337xxxxxxxx" pattern="[0-9]{10}"/>
             
            </div>

            <div>
                <label for="subject"></label><br>
                <select id="subject" name="subject">
                    <option value="finance">Finance</option>
                    <option value="consulting">Consulting</option>
                    <option value="renewal">Renewal</option>
                    <option value="newcontract">New Contract</option>
                    <option value="payments">Payments</option>
                </select>
            </div>
            <div>
                <label for="usermessage"></label><br>
                <textarea id="usermessage" name="usermessage" placeholder="Your message here"></textarea>
            </div>
            <div class="button">
                <button type="submit">Send message</button>
            </div>
         
        </form>
        
    </div>




</body>

</html>