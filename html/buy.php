<?php

    //configuration
    require("../includes/config.php");

   //check that form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must enter a symbol to buy.");
        }        
        else if (empty($_POST["num_shares"]))
        {
            apologize("You must enter a number of shares to buy.");
        }
        
        if (0 == preg_match("/^\d+$/", $_POST["num_shares"]))
        {
            apologize("You must enter a positive integer for the number of shares you want.");
        }        
                             
        //look up stock price
        $stock = lookup($_POST["symbol"]);
        if (FALSE === $stock)
        {    
            apologize("An error occurred. Please try completing your transaction another time.");            
        }        

        //determine total purchase price
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);

        if (FALSE === $cash)
        {    
            apologize("An error occurred. Please try completing your transaction another time.");            
        }        

        $number = $_POST["num_shares"];

        $share_price = number_format($stock["price"], 4);

        $price = $share_price * $number;
        
        //check that user has enough cash
        if ($price > $cash[0]["cash"])
        {
            apologize("You do not have sufficient funds to complete this purchase.");
        }        
        
        //input new shares in portfolio
        if (FALSE === query("INSERT INTO Portfolios (id, symbol, shares) 
            VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
            $_SESSION["id"], $_POST["symbol"], $_POST["num_shares"]))
        {
            apologize("Portfolio could not be updated. Please try completing your transaction another time.");            
        }
        
        //update user's cash
        if (FALSE === query("UPDATE users SET cash = cash - ? WHERE id = ?", 
            $price, $_SESSION["id"]))
        {
            apologize("Your funds could not be updated. Please try completing your transaction another time.");            
        }

        //update history
        if (FALSE === query("INSERT INTO History (id, transaction, date, symbol, 
            name, shares, price, total) VALUES(?, ?, NOW(), ?, ?, ?, ?, ?)",
            $_SESSION["id"], 'BUY',  $stock["symbol"], $stock["name"], 
            $_POST["num_shares"], $share_price, $price))
        {
            apologize("History could not be updated. Please try completing your transaction another time.");            
        }
        
        //render
        render("buy_form2.php", ["title" => "Buy shares", "number" => $number, 
            "name" => $stock["name"], "share_price" => $share_price, 
            "tot_price" => $price]);
    }
    
    //else render form
    else
    {
        render("buy_form.php", ["title" => "Buy shares"]);
    }

?>
