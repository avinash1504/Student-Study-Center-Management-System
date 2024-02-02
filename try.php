<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <title>Exercise 1-2</title>
            <meta http-equiv="content-type"
            content="text/html; charset=iso-8859-1" />
        </head>
    <body>
        <h1>Exercise 1-2 </h1>
        <p>
            <?php 
                // 1. $ReturnValue = 2 == 3;
                $ReturnValue = 2 == 3;
                echo "1." . ($ReturnValue ? 'true' : 'false') . "<br>";
                
                // 2. $ReturnValue = "2" + "3";
                $ReturnValue = "2" + "3";
                echo "2." . $ReturnValue . "<br>";
                
                // 3. $ReturnValue = 2 >= 3;
                $ReturnValue = 2 >= 3;
                echo "3." . ($ReturnValue ? 'true' : 'false') . "<br>";
                
                // 4. $ReturnValue = 2 <= 3;
                $ReturnValue = 2 <= 3;
                echo "4." . ($ReturnValue ? 'true' : 'false') . "<br>";
                
                // 5. $ReturnValue = 2 + 3;
                $ReturnValue = 2 + 3;
                echo "5." . $ReturnValue . "<br>";
                
                // 6. $ReturnValue = (2 >= 3) && (2 > 3);
                $ReturnValue = (2 >= 3) && (2 > 3);
                echo "6." . ($ReturnValue ? 'true' : 'false') . "<br>";
            
                // 7. $ReturnValue = (2 >= 3) || (2 > 3);
                $ReturnValue = (2 >= 3) || (2 > 3);
                echo "7." . ($ReturnValue ? 'true' : 'false') . "<br>";
            ?>
        </p>
    </body>
</html>