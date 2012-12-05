<form action="buy.php" method="post">
    <fieldset>
        <div class="control-group">
            <input autofocus name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="control-group">
            <input autofocus name="num_shares" placeholder="Number of shares" type="text"/>
        </div>        
        <div class="control-group">
            <button type="submit" class="btn">Buy shares</button>
        </div>
        <div>
          <a href="quote.php">Get share price</a>
        </div>
        <div>
            <a href="sell.php">Sell shares</a>
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
