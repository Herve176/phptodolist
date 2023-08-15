<?php
include 'controller.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="tablestyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <section>
    <form action="controller.php" method="POST">
      <input type="hidden" name="post-action" value="delete-property">
    <table>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Action</th>
      </tr>

      <?php
      $sqlquery1 = "SELECT id,title,description,date FROM todos";
      $conn = DB::getConnection();
      $result = $conn->query($sqlquery1);
      if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["date"]; ?></td>

            <td>
          <button type="submit" name="deleteItem" value=<?php $row["id"] ?>>DELETE</button>
          <a href="add.php">
            <button>ADD</button>
          </a>
          <a href="/run-php-/update.php">
            <button>UPDATE</button>
          </a>
        </td>

          </tr>
        <?php }
      } else { ?>
        <tr>
          <td colspan="4">No DATA Found in database</td>
        </tr>
      <?php }
      ?>
      
        
      </form>
    </table>
  </section>
</body>

</html>