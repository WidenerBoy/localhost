<table class="table table-striped">
    <thead>
        <tr>
            <th>Transaction</th>            
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price at time of sale</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= $row["transaction"] ?></td>
                <td><?= $row["date"] ?></td>                
                <td><?= $row["symbol"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["shares"] ?></td>                                
                <td>$<?= number_format($row["price"], 4) ?></td>
                <td>$<?= number_format($row["total"], 4) ?></td>                                
            </tr>                        
        <? endforeach ?>
    </tbody>
</table>
<div>
    <a href="history.php">Back to top</a>
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
    <a href="/">Back to home page</a>
</div>
<div>
    <b><a href="logout.php">Log Out</a></b>
</div>
