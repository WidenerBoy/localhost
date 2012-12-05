<form action="add_cash.php" method="post">
    <fieldset>
        <div>
            <p>Congratulations! Your transaction was successful!</p>
        </div>
        <div>
            <p>You added <?= $cash ?> to your account.</p>
        </div>
        <div>
            <a href="add_cash.php">Add more money</a>
        </div>
        <div>
          <a href="quote.php">Get share price</a>
        </div>
        <div>
            <a href="sell.php">Sell shares</a>
        </div>
        <div>
            <a href="buy.php">Buy shares</a>
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
