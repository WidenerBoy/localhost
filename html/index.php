<?php

    // configuration
    require("../includes/config.php"); 
    
    //get user's stock and account information
    $rows = query("SELECT symbol, shares, price, total FROM Portfolios 
        WHERE id = ?", $_SESSION["id"]);    

    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);   
    
    //prepare the information so it can be presented to the user
    foreach ($rows as &$row)
    {
        $info = lookup($row["symbol"]);
        $row["name"] = $info["name"];
        $row["price"] = number_format($info["price"], 4);
        $row["total"] = number_format(($row["price"] * $row["shares"]), 4);
    }    
                                           
    $rows[] = 
        [
        "symbol" => 'CASH',
        "name" => '',
        "shares" => '',
        "price" => '',
        "total" => number_format($cash[0]["cash"], 4),
        ];
    
    //render portfolio
    render("portfolio.php", ["title" => "Portfolio", "rows" => $rows]);

?>
