<form action="query.php" method="post">
    <fieldset>
        <div>
            <p><t>Enter the call numbers of the books you are looking for, one per line.</t></p>
            <p><t>(Please make sure there are no empty lines at the end.)</t></p>
        </div>
        <div class="control-group">
            <textarea rows="4" cols="50" autofocus name="call_number" placeholder="Call numbers" type="text"></textarea>			
        </div>       
        <div class="control-group">
            <button type="submit" class="btn">Search call numbers</button>
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
