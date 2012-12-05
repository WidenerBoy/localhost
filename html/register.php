<?php

    //configuration
    require("../includes/config.php");
    
    //if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        //validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
           
        //check if password matches
        if (($_POST["password"]) != ($_POST["confirmation"]))
        {
            apologize("Your password does not match. Please enter it again.");
        }

		//insert new data in users table and check uniqueness of inputted username
		$result = query("INSERT INTO users (username, hash, cash) 
			VALUES (?, ?, 10000.0000)", $_POST["username"], crypt($_POST["password"]));
		if ($result === false)
		{
			apologize("The username you have chosen already exists. Please select a new one.");
		}
		//else registration was successful, login, and proceed to portfolio
		else
		{
		 	$rows = query("SELECT LAST_INSERT_ID() AS id");
		 	$row = $rows[0];
		 	$id = $rows[0]["id"];		 	
		 
		    //remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $row["id"];

            //redirect to portfolio           
            redirect("/");
		}

    }
    else
    {
        //else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
?>
