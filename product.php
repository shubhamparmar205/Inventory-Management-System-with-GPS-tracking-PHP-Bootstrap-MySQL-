<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
  $selected_option=null;
  
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div>
      <form method="post" action="<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selected_option = $_POST['inventory']; 
    }
      ?>">
    <!-- <label for="inventory">Select an inventory:</label>
    <select name="inventory" id="inventory">
        <option value="Taco bell">Taco bell</option>
        <option value="Starbucks">Starbucks</option>
        <option value="Pandas">Pandas</option>
    </select>
    <input type="submit" name="submit" value="Submit"> -->
</form>

      </div>
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>

                <th> Product Title </th>
                <th class="text-center" style="width: 10%;"> Categories </th>
                <th class="text-center" style="width: 10%;"> In-Stock </th>
                <th class="text-center" style="width: 10%;"> Buying Price </th>
                <th class="text-center" style="width: 10%;"> Selling Price </th>
                <th class="text-center" style="width: 10%;"> Product Added </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php
              //   if ($_SERVER["REQUEST_METHOD"] == "POST") {
              //     // Get the selected category value
              //     $category_id = $_POST["category"];
                  
              //     // Connect to the database
              //     $servername = "localhost";
              //     $username = "root";
              //     $password = "";
              //     $dbname = "inventory_system";
                  
              //     $conn = new mysqli($servername, $username, $password, $dbname);
                  
              //     // Check connection
              //     if ($conn->connect_error) {
              //         die("Connection failed: " . $conn->connect_error);
              //     }
                  
              //     // Query the database for products in the selected category
              //     $sql = "SELECT * FROM products WHERE inventory = $category_id";
              //     $result = $conn->query($sql);
                  
              //     // Display the products
              //     if ($result->num_rows > 0) {
              //         while($row = $result->fetch_assoc()) {
              //             echo "Product ID: " . $row["product_id"] . "<br>";
              //             echo "Product Name: " . $row["product_name"] . "<br>";
              //             echo "Category ID: " . $row["category_id"] . "<br><br>";
              //         }
              //     } else {
              //         echo "No products found.";
              //     }
                  
              //     // Close the database connection
              //     $conn->close();
              // }
              
              
              foreach ($products as $product):
                if($selected_option === null):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                

            
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center" style='<?php echo ($product['quantity'] < 10) ? 'color: red;font-size:20px;font-weight:bold' : ''; ?>' id="stock"> <?php echo remove_junk($product['quantity']);?></td>
                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
                <?php endif; ?>
               
                <!-- <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td> -->
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>