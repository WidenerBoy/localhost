<form action="sell.php" method="post">
    <fieldset>
        <div>
            <select name="company">
                <option value=0>Select company</option>
                <?php foreach($companies as $company)
                    {
                        echo "<option value=$company>$company</option>\n";
                        //echo "<option value='$companies'>'$companies'</option>\n";                        
                    }    
                ?>
            </select>        
        </div>
        <div class="control-group">
            <button type="submit" class="btn">Sell shares</button>
        </div>
        <div>
            <a href="sell.php">Sell more shares</a>
        </div>
        <div>
            <a href="buy.php">Buy shares</a>
        </div>
        <div>
            <a href="add_cash.php">Add cash to your account</a>
        </div>
        <div>
            <a href="history.php">View history</a>
        </div>
        <div>
            <a href="/">Back to home page</a>
        </div>
        <div>
            <b><a href="logout.php">Log Out</a></b>
        </div>
    </fieldset>
</form>
