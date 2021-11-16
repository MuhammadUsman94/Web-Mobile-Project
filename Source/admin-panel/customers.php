<?php include 'header.php'; ?>
   <div id="page-wrapper">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row" id="main" >
            <div class="col-sm-12 col-md-12" id="content">
<h1>Customers</h1>
                  <table class="table table-sm">
   <tr>
      <th>Name</th>
      <th>Email</th>
   
   </tr>
   <?php
   include 'config.php';
   $collection = $client->restaurants->users;
   $users = $collection->find([]);
   foreach ($users as $key => $val ) {
      echo "<tr>";
         echo "<td>".$val->username."</td>";              
         echo "<td>".$val->email."</td>";
   ?>
   <?php
      echo "</tr>";
   }
   ?>
</table>


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
