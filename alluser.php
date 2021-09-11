
<!DOCTYPE html>
<?php
include 'connection.php';
$select="select * from all_users ";
$query=$connection->query($select);
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="alluser.css">
    <title>The Sparks Foundation</title>
  </head>
  <body>
    <h1 class="header">All Users</h1>
    <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Name</th>
      <th scope="col">Account No.</th>
      <th scope="col">Email id</th>
      <th scope="col">Balance</th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody><?php
                  while($res=mysqli_fetch_array($query))
                  {
                 ?>
    <tr>
      <th scope="row"><?php echo $res['Serial No.']?></th>
      <td><?php echo $res['Username']?></td>
      <td><?php echo $res['Account No.']?></td>
      <td><?php echo $res['Email id']?></td>
      <td><?php echo $res['Bank_Balance']?></td>
      <td><form action="transaction.php"><button type="submit" name="button">Transact</button></form></td>
    </tr>
    <?php
                  }
                  ?>

    </tbody>
    </table>

  </body>
</html>
