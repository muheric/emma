

<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $favorit_colorsError = null;
        $petError = null;
         
        // keep track post values
	if(isset($_POST['name']) && isset($_POST['favorit_colors'])){
		$name = $_POST['name'];
        $favorit_colors = $_POST['favorit_colors'];
        $pet = $_POST['pet'];
	}
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($favorit_colors)) {
            $favorit_colors = 'Enter your favorit color';
            $valid = false;
        }
		// else if ( !filter_var($favorit_colors,FILTER_VALIDATE_EMAIL) ) {
           // $emailError = 'Please enter a valid Email Address';
           // $valid = false;
        //}
		
         
        if (empty($pet)) {
            $petError = 'Enter your pets name';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO persons (name,favorit_colors,pet) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$favorit_colors,$pet));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Persons Identification</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($favorit_colorsError)?'error':'';?>">
                        <label class="control-label">Favorit Color</label>
                        <div class="controls">
                            <input name="Favorit Color" type="text" placeholder="my favorit color" value="<?php echo !empty($favorit_colors)?$favorit_colors:'';?>">
                            <?php if (!empty($favorit_colorsError)): ?>
                                <span class="help-inline"><?php echo $favorit_colorsError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($petError)?'error':'';?>">
                        <label class="control-label">Pet</label>
                        <div class="controls">
                            <input name="pet" type="text"  placeholder="eg. dog" value="<?php echo !empty($pet)?$pet:'';?>">
                            <?php if (!empty($petError)): ?>
                                <span class="help-inline"><?php echo $petError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>