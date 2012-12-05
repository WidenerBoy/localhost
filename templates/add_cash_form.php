<form action="add_cash.php" method="post">
    <fieldset>
        <div>
            <p>You must enter a number with two decimal places. Example: $9.99.</p>
        </div>        
        <div class="control-group">
            <input autofocus name="cash" placeholder="Money to be added" type="text"/>
        </div>        
        <div class="control-group">
            <button type="submit" class="btn">Add money</button>
        </div>
        <div>
          <a href="quote.php">Get share price</a>
        </div>
        <div>
            <a href="buy.php">Buy shares</a>
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
