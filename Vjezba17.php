<!DOCTYPE html>
<html lang="hr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba17</title>
</head>
<body>
    

    
    <?php
        $con=mysqli_connect("localhost", "root","","vj17");
        $query = "SELECT firstname, lastname, country_name FROM users LEFT JOIN countries ON users.country_id=countries.id";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result)) {
        echo "<p>".$row['firstname'] ." ". $row['lastname']." ". ($row['country_name'] != '' ? "(" . $row['country_name'] . ")" : "" ) . "</p>";
        }
        mysqli_close($con);
    ?>
</form>
</body>
</html>
