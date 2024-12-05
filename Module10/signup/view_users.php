<?php

$host = 'localhost';
$dbname = 'user_managment';
$username = "root";
$password = ""; //$password = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected";

    //Fetch all the data from the users table
    $sql = "SELECT id, username, email, created_at FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
" rel="stylesheet">
</head>
<body>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Registration Date</th>
    </tr>
  </thead>
  <tbody>
    <!-- Add the php code for adding the data -->
    <?php if (!empty($users)): ?>
      <?php foreach($users as $user): ?>
        <tr>
          <td><?php echo htmlspecialchars($user['id'])?></td>
          <td><?php echo htmlspecialchars($user['username'])?></td>
          <td><?php echo htmlspecialchars($user['email'])?></td>
          <td><?php echo htmlspecialchars($user['created_at'])?></td>
        </tr>
      <?php endforeach;?>
    <?php else: ?>
      <tr>
        <td colspan = "4" class= "text-center">No users found</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
</body>
</html> 