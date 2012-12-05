<form action="quote.php" method="post">
    <fieldset>
        <div>
          <p> The current price of a share of <?= $name ?> (<?= $symbol ?>)  is $<?= number_format($value, 4) ?>.</p>
        </div>
        <div>
          <a href="quote.php">Get another share price</a>
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
