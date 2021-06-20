<!DOCTYPE html>
<html>
{% extends "base.html" %}
{% block content %}
    <style>

        .linkSize:hover {
            font-size: 125%;
        }

        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}
        
        input[type=text], [type=email], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        
        input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }
        
        input[type=submit]:hover {
        background-color: #45a049;
        }
        
        .container {
            width: 45%; 
            text-align: center; 
            color: rgb(50, 50, 50); 
            font-size: larger; 
            font-weight: bold; 
            background-color: #f2f2f2; 
            padding: 5px; 
            padding-top: 10px;
        }

        .formcontainer {
        border-radius: 5px;
        padding: 20px;
        }


    </style>
    
    <?php

    if(isset($_POST['submit'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $state = $_POST['state'];
        $subject = $_POST['subject'];

        $mailTo = "info.reportthatpantry@gmail.com";
        $headers = "From: ".$mailTo;
        $txt = "You have recieved an email from ".$firstname." ".$lastname.". This was sent through the 'Contact Us' page.\n\n";

        mail($mailTo, "Contact Us Page", $subject, $mailTo);
        header("Location: contact_us.php?mailsend");
    }

    ?>

    <body>
        <div style="margin-top: 20px;">
                <div class= "container" style="width: 45%;">
                        <p class="text-center">
                        Report That Pantry
                        <br><br>
                        9701 Donna Klein Blvd, Boca Raton, FL
                        <br><br>
                        <u><a class="linkSize" id="contactEmail" href="mailto: info@reportthatpantry.org" style="color:rgb(50, 50, 50); hover{font-size: 125%}">info@reportthatpantry.org</a></u>
                        <br><br>
                        phone-number</p>
                </div>
                <div class="formcontainer" onsubmit="return false">
                    <form method = "post">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" placeholder="Enter your first name">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" placeholder="Enter your last name">
                        <label for="email">Email</label>
                        <input type="email" id="email" name = "email" placeholder="Enter your email" />
                        
                        <label for="state">State</label>
                        <select id="state" name="state">
                            <option disabled selected value> -- select a state -- </option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                        
                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Message" style="height:200px"></textarea>

                        <button onclick="wasSent()" type="submit" name="submit">Submit</button>
                </div>
                
        </div>
        <script>
            
            class User {
                constructor(firstName, lastName, state, email, subject) {
                this.firstName = firstName;
                this.lastName = lastName;
                this.state = state;
                this.email = email;
                this.subject = subject;
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                fields.firstName = document.getElementById('fname');
                fields.lastName = document.getElementById('lname');
                fields.email = document.getElementById('email');
                fields.state = document.getElementById('state');
                fields.subject = document.getElementById('subject');
               })
            
            
            function isNotEmpty(value) {
                if (value == null || typeof value == 'undefined' ) return false;
                    return (value.length > 0);
            }
            
            function isEmail(email) {
                let regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
                return regex.test(String(email).toLowerCase());
               }
            
            function fieldValidation(field, validationFunction) {
            if (field == null) return false;
            
            let isFieldValid = validationFunction(field.value)
            if (!isFieldValid) {
            field.className = 'placeholderRed';
            } else {
            field.className = '';
            }
            
            return isFieldValid;
            }
            
            function isValid() {
                var valid = true;
                
                valid &= fieldValidation(fields.firstName, isNotEmpty);
                valid &= fieldValidation(fields.lastName, isNotEmpty);
                valid &= fieldValidation(fields.state, isNotEmpty);
                valid &= fieldValidation(fields.email, isEmail);
                valid &= fieldValidation(fields.subject, isNotEmpty);
               
                return valid;
            }
            
            function wasSent() {
                if(isValid()){         
                    alert("${usr.firstName} thank you for contacting us.")
                }
                else{
                    alert("There was an error.")
                }
            }
               
        </script>
    </body>
{% endblock %}
</html>