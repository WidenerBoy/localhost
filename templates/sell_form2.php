<form action="sell.php" method="post">
    <fieldset>
        <div>
            <p>Congratulations! Your transaction was successful!</p>
        </div>
        <div>
            <p>You sold <?= $number ?> share(s) of <?= $name ?> 
                for $<?= number_format($share_price, 4) ?> each, for a total of $<?= number_format($tot_price, 4) ?>.</p>
        </div>
        <div>
            <a href="sell.php">Sell more shares</a>
        </div>
        <div>
          <a href="quote.php">Get share price</a>
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
