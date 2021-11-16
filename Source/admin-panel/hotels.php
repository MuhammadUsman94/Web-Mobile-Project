<?php include 'header.php'; ?>
   <div id="page-wrapper">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row" id="main" >
            <div class="col-sm-12 col-md-12" id="content">

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


<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
function status_change(order_id) {
   var status = $("#status_"+order_id).val();
   if (status !='') {
      var data = {
         'id' : order_id,
         'status' : status
      };
      $.ajax({
         url: "update_order.php",
         type: "post",
         data: data ,
         success: function (response) {
            Swal.fire({
               icon: 'success',
               title: 'Congrats!!!',
               text: 'Order Updated Successfully'
            })
         }  
      });
   }   
}
</script>

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
