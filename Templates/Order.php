<?php 
include('Connection.php');

$errors=array('email'=>'','TacosName'=>'','TacosSize'=>'');
$sqlTacosSize = "SELECT * FROM tacossizes";
if ($queryTacosSize = mysqli_query($cnx, $sqlTacosSize)) {
  
  $tacosSizes = mysqli_fetch_all($queryTacosSize, MYSQLI_ASSOC);

}

if(isset($_POST['Submit'])){
  $email=$_POST['email'];
  $TacosName=$_POST['TacosName'];  
  $TacosSize=$_POST['TacosSize'];

  $isTacosNameAlpha = (bool)preg_match('/[a-zA-Z\s]+$/',$TacosName);
  if(empty($email)) {
    $errors['email'] ='The email is required <br/>';
  }
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'The email must be a validate adresse <br/>';
  }

 if(empty($TacosName)) {
   $errors['TacosName'] ='The TacosName is required <br/>';
  }
 else if(!$isTacosNameAlpha){
    $errors['TacosName'] = 'The TacosName must be a validate  <br/>'; 
  }
 
 if(empty($TacosSize)) {
   $errors['TacosSize'] = 'The TacosSize is required <br/>';
  }
 
 if (!array_filter($errors)) {
  $emailDb=mysqli_real_escape_string($cnx,$email);
  $TacosNameDb=mysqli_real_escape_string($cnx,$TacosName);
  $TacosSizeDb=mysqli_real_escape_string($cnx,$TacosSize);
  $sql="INSERT INTO tacostype (tacosname,tacossize,email ) VALUES  ('$TacosNameDb','$TacosSizeDb','$emailDb')";
   if (mysqli_query($cnx,$sql)) {
    echo 'succes'; 
  }
  else {
      echo 'error'.mysqli_error($cnx);
  }
  // header('location:index.php');
 }
 
}

// $isTacosSizeSmallSelected = isset($TacosSize) && $TacosSize == 's' ? 'selected' : '';


?>      



<!DOCTYPE html>
<html lang="en">
<?php include('Header.php'); ?>
<section class="container black-text ">
    <h4 class="center">Make an Order</h4>
    <form class="blue-grey lighten-5" action="Order.php" method="POST">
      <label for=""> Your Email : </label><input type="email" name="email" placeholder="Exemple@gmail.com" value="<?php echo isset($email) ? $email : '' ?>">
      <div class="red-text"><?php echo $errors['email'] ; ?></div>
      <label for=""> Tacos Title </label><input type="text" name="TacosName" placeholder="Tacos Title" value="<?php echo isset($TacosName) ? $TacosName : '' ?>">
      <div class="red-text"><?php echo $errors['TacosName']; ?></div>
      <label for="TacosSize"> Tacos Size: </label>
      <select name="TacosSize" id="TacosSize" style="display:block;">
        <option value="">Select an option</option>
        <?php foreach ($tacosSizes as $tacosSizeItem): ?>
        <option value="<?php echo $tacosSizeItem['id']; ?>"  <?php echo isset($TacosSize) && $TacosSize == $tacosSizeItem['id'] ? 'selected' : '' ?>><?php echo $tacosSizeItem['label']; ?></option>
        <?php endforeach; ?>
      </select>
      <div class="red-text"><?php echo $errors['TacosSize']; ?></div>
   
      <div class="center">
        <input type="submit" name="Submit" value="Order" class="btn brand z-depht-0"> 
      </div>
    </form>
</section>
<?php include('Footer.php'); ?>

    

</html>


