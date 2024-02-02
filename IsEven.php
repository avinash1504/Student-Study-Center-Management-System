<!DOCTYPE html>
<html>
        <head>
            <title>Single Family Home</title>
        </head>
    <body>
        <?php
        function check($number)
            {
            if(is_float($number))
                {
                $number = round($number);
                }
            else if(is_numeric($number) && ($number%2) == 0)
                {
                echo("EVEN");
                }
            else
                {
            echo("ODD");
                }
            }

            $number = 35;
            check($number);
        ?>
    </body>
</html>