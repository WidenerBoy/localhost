<?php

    //configuration
    require("../includes/config.php");

    //check that form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        //validate submission
        if (($_POST["company"]) === 0)
        {
            apologize("You must enter a symbol to sell.");
        }        
        
        //look up stock price and calculate sale value
        $stock = lookup($_POST["company"]);

        $num_shares = query("SELECT shares FROM Portfolios WHERE id = ? 
            AND symbol = ?", $_SESSION["id"], $_POST["company"]);            

        if (FALSE === $num_shares)
        {
            apologize("An error occurred. Please try completing your transaction another time.");
        }        

        $price = $stock["price"] * $num_shares[0]["shares"];
        
        //delete sold shares from portfolio
        if (FALSE === query("DELETE FROM Portfolios WHERE id = ? AND symbol = ?",             
            $_SESSION["id"], $_POST["company"]))
        {
            apologize("Portfolio could not be updated. Please try completing your transaction another time.");            
        }
        
        //update user's cash
        if (FALSE === query("UPDATE users SET cash = cash + ? WHERE id = ?", 
            $price, $_SESSION["id"]))
        {
            apologize("Your funds could not be updated. Please try completing your transaction another time.");            
        }

        //update history 
        if (FALSE === query("INSERT INTO History (id, transaction, date, symbol, 
            name, shares, price, total) VALUES(?, ?, NOW(), ?, ?, ?, ?, ?)", $_SESSION["id"], 'SELL',  
            $stock["symbol"], $stock["name"], $num_shares[0]["shares"], $stock["price"], $price))
        {
            apologize("History could not be updated. Please try completing your transaction another time.");            
        }
        
        //render
        render("sell_form2.php", ["title" => "Sell shares", 
            "number" => $num_shares[0]["shares"], "name" => $stock["name"], 
            "share_price" => $stock["price"], "tot_price" => $price]);
      
    }

    //else render form
    else
    {
        //prepare array for drop-down menu
        $data = query("SELECT symbol FROM Portfolios WHERE id = ?", $_SESSION["id"]);

        foreach ($data as $row)
        {
            $companies[] = $row["symbol"];
        }

        render("sell_form.php", ["title" => "Sell shares", "companies" => $companies]);
    }

?>
