<?php

    //configuration
    require("../includes/config.php");

    $new_arr2 = array();
    global $locations;

   //check that form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate submission
        if (empty($_POST["call_number"]))
        {
            apologize("You must enter at least one call number to search.");
        }                

        //$new_arr = $_POST["call_number"];
        
        $new_arr = nl2br($_POST["call_number"], true); //http://ca3.php.net/manual/en/function.nl2br.php

        $new_arr = explode('<br />', trim($new_arr, '<br />')); //http://stackoverflow.com/questions/5003458/how-to-parse-key-value-chain-into-associative-array-in-php
        
        //$new_arr = str_replace('<br />', '', $new_arr);
               
        $n = 0;
        
        foreach ($new_arr as $row)
        {
			//update history (EDIT)
	        if (FALSE === query("INSERT INTO history1 (search_number, date, call_numbers_searched) VALUES(LAST_INSERT_ID(), NOW(), ?) ",             
    	        $row))
    	    {
    	        apologize("History could not be updated. Please try completing your search another time.");            
    	    }
            $new_arr2[$n] = explode(' ', trim($row, ' '));
            $n = $n + 1;
        }
        
        //dump($new_arr2);	

        $i = 0;
				
       foreach ($new_arr2 as $row1)
        {    
				//dump($row1);
						//$i = 0;*/
                //$locations = query("SELECT location FROM call_number_table 
	                //WHERE ? BETWEEN begin AND end", $row1[0]);
                $locations[$i] = $row1[0];
                $i = $i + 1;
	                                

        }
		dump($locations);

/*        foreach ($new_arr2 as $key => $row1)
        {    
                $locations = query("SELECT location FROM call_number_table 
	                WHERE ? BETWEEN begin AND end", $row1[$key]);
                $locations = query("SELECT location FROM call_number_table 
	                WHERE 'JX' BETWEEN begin AND end");	                
        }*/
	

		
        //look up call numbers
        /*$stock = lookup($_POST["call_numbers"]);
        if (FALSE === $stock)
        {    
            apologize("An error occurred. Please try completing your search another time.");            
        }                
        */
        /*
        //update history (EDIT)
        if (FALSE === query("INSERT INTO history1 (date, call_numbers_searched) VALUES(NOW(), ?)",             
            $new_arr))
        {
            apologize("History could not be updated. Please try completing your search another time.");            
        }*/
        
        //render (EDIT)
        render("query_form2.php", ["title" => "Search call numbers", "new_arr" => $new_arr2]);
            
         
    }
    
    //else render form
    else
    {
        render("query_form1.php", ["title" => "Search call numbers"]);
    }

?>
