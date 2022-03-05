<?php 

// $peoples = [
//     ['firstName'=>'Mehdi','lastName'=>'Belfallah','Age'=>22],
//     ['firstName'=>'Hamza','lastName'=>'Elhaissouf','Age'=>22],
//     ['firstName'=>'Oussama','lastName'=>'Belfallah','Age'=>32],
//     ['firstName'=>'Amine','lastName'=>'Maoudi','Age'=>27],
// ];
// print_r($peoples);

// foreach($peoples as $peolpe)
// {
//     echo $peolpe['firstName']."&nbsp".$peolpe['lastName']."&nbsp ".$peolpe['Age'] ."<br>"; 
// }
 include('Templates/Connection.php'); 
$sql='SELECT * from tacostype';
$result=mysqli_query($cnx,$sql);
$tacos=mysqli_fetch_all($result,MYSQLI_ASSOC);
// print_r($tacos);

?>
<!DOCTYPE html>
<?php include('Templates/Header.php');?>
<h4 class="center grey-text">Tacos!</h4>
<div class="container">
    <div class="row">
        <?php foreach ($tacos as  $taco){ ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h5> <?php echo htmlspecialchars($taco['TacosName']);?> </h5>
                        <h5> <?php echo htmlspecialchars($taco['TacosSize']);?> </h5>
                    </div>
                    <div class="card-action right align">
                        <a href="#" class="brand-text">More Info</a>
                    </div>
                </div>
            </div>
            
        <?php } ?>
    </div>
</div>
<?php include('Templates/Footer.php');?>

</html>