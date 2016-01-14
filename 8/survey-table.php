<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="js/MODALONLYbootstrap.min.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/MODALONLYbootstrap.min.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
  
  <body>
    <section>
      <div class="container">
        <?php
        /* connect to the db */
        $server = 'localhost';
        $username = 'root';
        $pw = '';
        $db = 'kadai';
        
        $conn = new mysqli($server, $username, $pw, $db);
        
/* show tables */
        $result = $conn->query('SHOW TABLES') or die('cannot show tables');
        while($tableName = mysqli_fetch_row($result)) {

	       $table = $tableName[0];
	
	       echo '<h3>',$table,'</h3>';
	       $result2 = $conn->query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
	       if(mysqli_num_rows($result2)) {
		      echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		      echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
		        while($row2 = mysqli_fetch_row($result2)) {
			     echo '<tr>';
			     foreach($row2 as $key=>$value) {
				    echo '<td>',$value,'</td>';
			     }
			echo '</tr>';
		}
		echo '</table><br />';
	}
}
        
        ?>
      </div>
  </body>
</html>