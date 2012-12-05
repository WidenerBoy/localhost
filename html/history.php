<?php

    // configuration
    require("../includes/config.php"); 
    
    //get history data
    $rows = query("SELECT transaction, date, symbol, name, shares, price, total 
    FROM History WHERE id = ?", $_SESSION["id"]);    
    
    //render history
    render("display_history.php", ["title" => "History", "rows" => $rows]);
    
?>

