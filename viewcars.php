<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sam's Used Cars</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>Sam's Used Cars</h1>
    <h3>Complete Inventory</h3>

    <?php
      include 'db.php';
      // SQL statement that produces the list of cars to be displayed
      $query = "SELECT * FROM Images";
      // If statement checks the result of the query
      if ($result = $mysqli->query($query))
      {
        // Don't do anything if successful.
      }
      else
      {
        // Otherwise, print error message if query fails.
        echo "Error getting cars from the database:".
        mysqli_error($mysqli)."<br>";
      }
      // Create table headers
      echo "<table id='Grid' style='width: 80%'><tr>";
      // Creates the first row of the table
      echo "<th style='width: 50px'>Edit Car</th>";
      echo "<th style='width: 50px'>VIN</th>";

      // Clsoing tag for the table row
      echo "</tr>\n";



      // Loop through all the rows returned by the query
      while ($result_ar = mysqli_fetch_assoc($result))
      {
        // Data that goes in row
        // Edit Car
        echo "<td><form action='viewcar.php' method='GET'><a href='viewcar.php?
        VIN=".$result_ar['VIN']."'>".'Click Here to Edit'."
        </a></form></td>";

        // Vin number
        echo "<td>".$result_ar['VIN']."</td>";
        echo "</td></tr>\n";

      }
      echo "</table>";
      // Close the database
      $mysqli->close();
    ?>
    <br/>


  </body>
</html>
