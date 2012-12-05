<form action="query.php" method="post">
    <fieldset>
        <div>
            <p>You looked up the following call numbers:</p>
        </div>
        <table class="table table-striped">
    <thead>
        <tr>
            <th>Call number</th>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
            <th>Column 4</th>                                                          
            <th>Column 5</th>                                                                      
        </tr>
    </thead>
    <tbody>
        <?php foreach ($new_arr as $row1): ?>
            <tr>
            <?php foreach ($row1 as $row2): ?>            
                <td><?= $row2 ?></td>            
            <? endforeach ?>
            </tr>                        
        <? endforeach ?>
    </tbody>
</table>
        <div>
            <a href="buy.php">Buy more shares</a>
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
