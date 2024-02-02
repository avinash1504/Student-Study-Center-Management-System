<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xml:lang="en" lang="en">
<head>
    <!-- Metadata for character encoding -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Title of the document -->
    <title>Interest Array</title>
</head>
<body>

<?php
    // Declare an array named $RatesArray to store interest rates
    $RatesArray = array(
        0.0725, // Interest Rate 1
        0.0750, // Interest Rate 2
        0.0775, // Interest Rate 3
        0.0800, // Interest Rate 4
        0.0825, // Interest Rate 5
        0.0850, // Interest Rate 6
        0.0875  // Interest Rate 7
    );

    // Loop through each rate in the array and display it
    foreach ($RatesArray as $rate) {
        // Multiply by 100 to get a percentage and display the interest rate
        echo "Interest Rate: " . ($rate * 100) . "%<br />";
    }
?>

</body>
</html>