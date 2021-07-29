<!DOCTYPE html>
<html>
  <head>
    <title>Sam's Used Cars</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

  </head>
  <body>
    <h1>Sam's Used Cars</h1>

    <?php
      include 'db.php';


      // Create $vin variable and assign it to the value that url string
      $vin = $_GET['VIN'];


      // Builds query string
      // Current Car
      $query = "SELECT * FROM Images WHERE VIN='$vin'";


      // Try to query the database
      // Create result set
      if ($result = $mysqli->query($query))
      {
        // Don't do anything if successful
      }
      else
      {
        // Produce error if query has an error
        echo "Sorry, a vehicle with VIN of $vin cannot be found";
        mysqli_error($mysqli)."br";
      }


      // Loop though all the rows returned by the query, creating a table row for each
      while ($result_ar = mysqli_fetch_assoc($result))
      {
        // Assign a series of variables with the values of the specific data columns
        echo "<td>".$result_ar['VIN']."</td>";
        // Year
        // Closing tag for row
        echo "</td></tr>\n";
        // Used to get data from image column to store image
        $image = $result_ar['ImageFile'];
        $image2 = $result_ar['ImageFile1'];
        $image3 = $result_ar['ImageFile2'];
        // Display images
        echo "<IMG src='Images/$image' width='250'>";
        echo "<IMG src='Images/$image2' width='250'>";
        echo "<IMG src='Images/$image3' width='250'>";
      }
      echo "</table>";
      $mysqli->close();
    ?>

  </body>
</html>
