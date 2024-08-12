<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../assets/css/style.css" /> -->
    
    <title>Register</title>

</head>
<body class="bg-light">
  <div class="mt-5">
      <div class="card w-25 my-auto mx-auto">
        <div class="card-header bg-white border-0 py-3">
          <h1 class="text-center">REGISTER</h1>
        </div>
        <div class="card-body">
          <form action="../actions/register.php" method="POST">
            <div class="mb-3 px-2">
              <label for="firstname" class="form-lavel">First Name</label>
              <input type="text" name="firstname" id="firstname" class="form-control" required/>
            </div>
            <div class="mb-3 px-2">
              <label for="lastname" class="form-lavel">Last Name</label>
              <input type="text" name="lastname" id="lastname" class="form-control" required/>
            </div>
            <div class="mb-3 px-2">
              <label for="username" class="form-lavel fw-bold">Username</label>
              <input type="text" name="username" id="username" class="form-control" maxlength="15" required/>
            </div>
            <div class="mb-3 px-2">
              <label for="password" class="form-lavel fw-bold">Password</label>
              <input type="password" name="password" id="password" class="form-control"/>
              <div class="form-text" id="password-info">
                  Password must be at least 8 characters long.
              </div>
            </div>
            <div class="px-2">
              <button type="submit" name="btn_register" class="btn btn-success w-100">Register</button>
            </div>
          </form>
            <div class="my-3 text-center small px-2">
              <p>Registered already? <a href="../views">Log in</a></p>
            </div>
  
        </div>

      </div>
 
  </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
