<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
  $mysql = new mysqli("localhost", "root", "test12345", "magebit");
  $mysql->query("SET NAMES 'utf8'");
  
  if ($mysql->connect_error) {
    echo 'Error number:' . $mysql->connect_errno . '<br>';
    echo 'Error: ' . $mysql->connect_error;
  } else {
    $mysql->query("CREATE TABLE `users` (
          id INT(11) NOT NULL AUTO_INCREMENT,
          email VARCHAR(50) NOT NULL,
          date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY(id)
        )");
  }
  ?>

 
<?php 
if(isset($_POST['submit'])) {
    if(isset($_POST['id'])) {
      foreach($_POST['id'] as $id) {
        $query="DELETE FROM users WHERE id='$id'";
        mysqli_query($conn, $query);
        }
    } 
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);
?>
<div class="table style= width: 400px;">
<form class="form" method="post" action="table.php">

                
                  
                        <table>
                          <tr>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Delete</th>
                          </tr>
                          <?php  
                            while ($row = mysqli_fetch_array($result)){                
                            ?>
                          <tr>
                          <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><input class="checkbox-delete" type="checkbox" name="id[]" value="<?= $row['id']; ?>" style="margin-left: 26px;"></td>
                         </tr>
                            <?php
                            }  
                        ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td><input id="delete-product-btn" name="submit" type="submit" value="DELETE" ></td>
                        </tr>
                        </table>
                        
                        

                          </form>
                        <?php
                      
                        mysqli_close($conn);
                        ?>
                </div>                    
    <footer class="footer">

    </footer>
</body>

</html>