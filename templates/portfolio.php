<table class="table table-striped">
    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Current Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= $row["symbol"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["shares"] ?></td>                                
                <td>$<?= $row["price"] ?></td>
                <td>$<?= $row["total"] ?></td>                                
            </tr>                        
        <? endforeach ?>
    </tbody>
</table>
<div>
    <a href="query.php">Call numbers</a>
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
    <b><a href="logout.php">Log Out</a></b>
</div>
