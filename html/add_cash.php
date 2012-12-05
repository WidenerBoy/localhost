<?php

    //configuration
    require("../includes/config.php");

    //check that form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate submission
        if (empty($_POST["cash"]))
        {
            apologize("You must enter money to add.");
        }                                

        //make sure the user enters a positive decimal number (preg_match from: user k102 at http://stackoverflow.com/questions/6772603/php-check-if-number-is-decimal)
        if (0 == preg_match("/^\d+\.\d+$/", $_POST["cash"]))
        {
            apologize("You must enter a positive decimal number for the money you want to add.");
        }                                     
       
        //update user's cash
        if (FALSE === query("UPDATE users SET cash = cash + ? WHERE id = ?", 
            $_POST["cash"], $_SESSION["id"]))
        {
            apologize("Your funds could not be updated. Please try completing your transaction another time.");            
        }

        //update history
        if (FALSE === query("INSERT INTO History (id, transaction, date, price, total) VALUES(?, ?, NOW(), ?, ?)",
            $_SESSION["id"], 'ADD CASH',  $_POST["cash"], $_POST["cash"]))
        {
            apologize("History could not be updated. Please try completing your transaction another time.");            
        }
        
        //render
        render("add_cash_form2.php", ["title" => "Add cash", "cash" => $_POST["cash"]]);

    }
    
    //else render form
    else
    {
        render("add_cash_form.php", ["title" => "Add cash"]);
    }

?>
