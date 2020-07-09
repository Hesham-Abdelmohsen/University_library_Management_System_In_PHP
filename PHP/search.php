<?php

include_once 'session.php';

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view all books</title>
    <style type="text/css">
            table
            {
                border-collapse:collapse;
                width:100%;
                color: black;
                font-family:monospace;
                font-size:20px;
                text-align:left;
            }

            th
            {
                height:50px;
                background-color:#d96459;
                color: white;

            }

            td
            {
                height:30px;       
            }

            tr:nth-child(even)
            {
                background-color:#f2f2f2;
            }

            .filter
            {
                margin:10px;
                width:300px;
                height:30px;
            }
            
    </style>
</head>

<input  autocomplete="off" id ="myInput" class = "filter" name = "bookname" 
onkeyup="myFunction()"  placeholder="book name" dat-col="name">

<input autocomplete="off" id ="isbnInput" class = "filter" name = "ISBN" 
onkeyup="myFunction()"  placeholder="ISBN" dat-col="ISBN">

<input autocomplete="off"id ="author" class = "filter" name = "author" 
onkeyup="myFunction()" placeholder="author" dat-col="author"> 

<input autocomplete="off" id ="year" class = "filter" name = "year" 
onkeyup="myFunction()" placeholder="year" dat-col="year"> 


    <table id="mytable" class="w3-table-all">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Publication Year</th>
            <th>Author</th>
            <th>ISBN</th>
            </tr>

            <?php
    $mysqli = new mysqli("localhost:3325", "root", "", "mydb");

    $sql = "SELECT id, name, pubyear, author, isbn FROM books";
    $result = $mysqli -> query($sql);

    while($row = $result-> fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['pubyear']?></td>
                <td><?php echo $row['author']?></td>
                <td><?php echo $row['isbn']?></td>
            </tr>


            <?php
                }
            ?>

        </table>
    </div>

   
    <script>
        function myFunction()
        {
            var input, filter, table, tr, td, i, txtValue;
            input=document.getElementById("myInput") ;
             
            isbnInput = document.getElementById("isbnInput") ;
            var filter;
            
            authorinput = document.getElementById("author") ;
             
            yearinput = document.getElementById("year") ;
             

            table = document.getElementById("mytable") ;
            tr = table.getElementsByTagName("tr");
            var isbnFilter;

            var authorFilter;
            var yearFilter;

            if(input.value) {
                filter = input.value.toUpperCase();
            }
            
            if(isbnInput.value) {
                isbnFilter = isbnInput.value;
            }
                
            if(authorinput.value) {
                authorFilter = authorinput.value;
            }
             
            if(yearinput.value) {
                yearFilter = yearinput.value;
            }
            
            for(i=0; i< tr.length ; i++)
            {

                td=tr[i].getElementsByTagName("td")[1];
                isbnTd = tr[i].getElementsByTagName("td")[4];
                authortd =tr[i].getElementsByTagName("td")[3];
                yeartd= tr[i].getElementsByTagName("td")[2];
                if(filter && td)
                {
                    txtValue=td.textContent || td.innerText;
                    if(txtValue.toUpperCase().indexOf(filter) > -1)
                    {
                        tr[i].style.display = "";
                    }
                    else
                    {
                        tr[i].style.display = "none";
                    }    
                }

                
                if(isbnFilter && isbnTd)
                {
                    console.log("searching isbn");
                    txtValue=isbnTd.textContent || isbnTd.innerText;
                    if(txtValue.indexOf(isbnFilter) > -1)
                    {
                        tr[i].style.display = "";
                    }
                    else
                    {
                        tr[i].style.display = "none";
                    }    
                }



                if(authorFilter && authortd)
                {
                    console.log("searching author");
                    txtValue=authortd.textContent || authortd.innerText;
                    if(txtValue.indexOf(authorFilter) > -1)
                    {
                        tr[i].style.display = "";
                    }
                    else
                    {
                        tr[i].style.display = "none";
                    }    
                }


                 
                if(yearFilter && yeartd)
                {
                    console.log("searching year");
                    txtValue=yeartd.textContent || yeartd.innerText;
                    if(txtValue.indexOf(yearFilter) > -1)
                    {
                        tr[i].style.display = "";
                    }
                    else
                    {
                        tr[i].style.display = "none";
                    }    
                }


            }
        }
    </script>
</body>
</html>