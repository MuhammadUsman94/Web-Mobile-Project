<?php

$hotel_id = $_GET['id'];


if (empty($hotel_id)) {
header("Location: http://localhost/online-food//hotels.php");
   die();
}




?>
<?php

include 'config.php';
$collection = $client->restaurants->hotels;
$hotel = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($hotel_id)]);
?>
<?php include 'header.php'; ?>
   <div id="page-wrapper">
      <div class="container-fluid">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:right;">
  Add Menu
</button>
         <!-- Page Heading -->
         <div class="row" id="main" >
            <div class="col-sm-12 col-md-12" id="content">
               <h5><i>Name: <?php echo $hotel->name;?></i></h5>
               <h5><i>Address: <?php echo $hotel->address;?></i></h5>
               <h5><i>Speciality: <?php echo $hotel->cuisines;?></i></h5>

               

                  <table class="table table-borderd">
   <tr>
      <th>Dish</th>
      <th>Description</th>
      <th>Price</th>
   </tr>


   <?php

   foreach ($hotel->menu as $key => $val ) {
      echo "<tr>";
      echo "<td>".$val->name."</td>";  
      echo "<td>".$val->desc."</td>";  
      echo "<td>$".number_format($val->price,2)."</td>";  
      echo "<tr/>";
   }
   ?>
</table>


   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_menu.php" method="POST">
      <div class="modal-body">

         <input type="text" name="name" id="name" required="required" placeholder="Menu Name" class="form-control"> <br>
         <input type="text" name="desc" id="desc" required="required" placeholder="Enter Description" class="form-control"> <br>
         <input type="number" name="price" id="price" required="required" placeholder="Menu Price" class="form-control"> <br>

        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
   </div>
   </div>




            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php include 'footer.php'; ?>
