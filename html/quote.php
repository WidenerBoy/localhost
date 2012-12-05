<?php

    //configuration
    require("../includes/config.php");

    //check that form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must enter a symbol to search.");
        }        
        
        //look up stock price, render if found
        $stock = lookup($_POST["symbol"]);        

        if ($stock === false)
        {
            apologize("The symbol you entered is invalid. Please a new one.");
        }
        else
        {
            render("display_quote.php", ["title" => "Share Value", 
                "name" => $stock["name"], "symbol" => $stock["symbol"], "value" => $stock["price"]]);
        }              
    }

    //else render form
    else
    {
        render("quote_form.php", ["title" => "Look Up Share Value"]);
    }

?>
