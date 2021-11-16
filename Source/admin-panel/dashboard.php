<?php include 'header.php'; ?>
   <div id="page-wrapper">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row" id="main" >
            <div class="col-sm-12 col-md-12" id="content">

  
   <?php
   include 'config.php';
   $collection = $client->restaurants->users;
   $users = $collection->find([]);
   $i = 0;
   $user_count = 0;
   foreach ($users as $key => $val ) {
      $i++;
      $user_count = $i;
   }
   ?>


   <?php

   $collection = $client->restaurants->hotels;
   $hotels = $collection->find([]);
   $i = 0;
   $hotel_count = 0;
   foreach ($hotels as $key => $val ) {
      $i++;
      $hotel_count = $i;
   }
   ?>


   <?php


   $collection = $client->restaurants->users;
   $users = $collection->find([]);
   $order_count_dashboard = 0;
         $order_ii = 0;
   foreach ($users as $key => $val ) {
      if (isset($val->orders)) {
         $order_data = json_decode(json_encode(iterator_to_array($val->orders)), TRUE);
         $order_count = count($order_data) - 1;
         for ($i = 0; $i<=$order_count; $i++) {
            $order_ii++;
            $order_count_dashboard = $order_ii;
         }
      }
   }
   ?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="">
   <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-address-card-o fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $user_count;?></p>
                <p class="announcement-text">Customers</p>
              </div>
            </div>
          </div>
          <a href="http://localhost/online-food/customers.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-shopping-basket fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $hotel_count;?></p>
                <p class="announcement-text"> Hotels</p>
              </div>
            </div>
          </div>
          <a href="http://localhost/online-food/hotels.php">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <i class="fa fa-first-order fa-5x"></i>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $order_count_dashboard;?></p>
                <p class="announcement-text"> Orders!</p>
              </div>
            </div>
          </div>
          <a href="http://localhost/online-food/">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  Expand
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <h2>Hotels</h2>
        <table class="table table-borderd">
   <tr>
      <th>Name</th>
      <th>Address</th>
      <th>View</th>
   </tr>
   <?php
   include 'config.php';
   $collection = $client->restaurants->hotels;
   $users = $collection->find([]);
   foreach ($users as $key => $val ) {

    if ($key == 5 ) {
      break;
    }

      echo "<tr>";
         echo "<td>".$val->name."</td>";              
         echo "<td>".$val->address."</td>";
   ?>
   <td>
      <a href="view_details.php?id=<?php echo $val->_id;?>" class="btn btn-success">View Menu</a>
      <a href="delete_hotel.php?id=<?php echo $val->_id;?>" class="btn btn-danger">Delete Hotel</a>
   </td>
   <?php
      echo "</tr>";
   }
   ?>
</table>


    </div><!-- /.row -->
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
