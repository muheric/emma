<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="file:///C:/wamp/www/emma/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
			
			<p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
				
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Favorit Color</th>
                      <th>Pet</th>
					  <th>Action</th>
					  
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM persons ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['favorit_colors'] . '</td>';
                            echo '<td>'. $row['pet'] . '</td>';
							echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>