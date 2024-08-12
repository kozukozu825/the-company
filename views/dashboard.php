<?php
  session_start();
  require "../classes/User.php";

  $user = new User();

  $all_users = $user->getAllusers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>The Company Dashboard</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand">The Company</a>

      <button type="button" class="navbar-toggler" data-bs-targer="#menu" data-bs-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="callapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION["username"]?></a></li>
          <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="row justify-content-center gx-0">
    <div class="col-6">
      <h2 class="text-center">USER LIST</h2>

        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th><!-- for photo --></th>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th><!-- for action buttons --></th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($user = $all_users->fetch_assoc()){
            ?>
              <tr>
                <td>
                  <?php
                      if($user['photo']){
                    ?>
                      <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="
                      dashboard-photo">

                  <?php
                      }else{
                  ?>
                      <i class="fa-solid fa-user dashboard-icon d-block text-center"></i>
                  <?php
                      }
                  ?>
                </td>
                <td><?= $user['id']?></td>
                <td><?= $user['first_name']?></td>
                <td><?= $user['last_name']?></td>
                <td><?= $user['username']?></td>
                <td>
                  <?php
                      if($_SESSION['id'] == $user['id']){
                  ?>
                      <a href="edit-user.php"  class="btn btn-outline-warning" title="Edit">
                      <i class="fa-solid fa-pen-to-square"></i>
                      </a>

                      <a href="delete-user.php"  class="btn btn-outline-danger" title="Delete">
                      <i class="fa-solid fa-trash"></i>
                      </a>

                  <?php
                      }
                  ?>
                </td>
              </tr>

            <?php
                }
            ?>  
          </tbody>
        </table>
    </div>
  </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>