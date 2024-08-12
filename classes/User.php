<?php
 require_once "Database.php";

 class User extends Database{
  //Insert data into the database
  public function store($request){
     $first_name = $request['firstname'];
     $last_name = $request['lastname'];
     $username = $request['username'];
     $password = $request['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`)
            VALUES (
               '$first_name', '$last_name', '$username', '$password'
            )
        ";
      //If the connection is successful
      if($this->conn->query($sql)){
        header("location: ../views"); //go to index.php
        exit;
      }else{
        //If there's an error encounterd during the sql execution
        die("Error creating the user: ". $this->conn->error);
      }
  }

  public function login($request){
    $username = $request['username'];
    $password = $request['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    //$result is an object which holds the return of the query
    $result = $this->conn->query($sql);

    // Check if username has a match in the database
    if($result->num_rows == 1){
      //Successful query, username has a record in the database
      //Check the password if it's correct
      $user = $result->fetch_assoc(); //transform the result into an associative array

      if(password_verify($password, $user['password'])){
      //Create a session variable for fufure use.
      session_start();
      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['fullname'] = $user['first_name'] . " " .$user['last_name'];

      header("location: ../views/dashboard.php");
      exit;
       }else{
        die("Password is incorrect");
      }
    }else{
      die("Username not found.");
    }
  }

  public function logout(){
    session_start();
    session_unset();
    session_destroy();

    header('location: ../views');
    exit;
  }

  public function getAllUsers(){
    $sql = "SELECT id, first_name, last_name, username, photo FROM users";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die('Error retriving all users: ' . $this->conn->error);
    }
  }

  public function getUser(){
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
     if($result = $this->conn->query($sql)){
      return $result->fetch_assoc();
     }
  }

  public function update($request, $files){
    session_start();

    $id = $_SESSION['id'];

    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $username = $request['username'];
    $photo = $files['photo']['name'];
    $tmp_photo = $files['photo']['tmp_name'];

    $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username'  WHERE id = $id";

    if($this->conn->query($sql)){
      $_SESSION['username'] = $username;
      $_SESSION['full_name'] = "$first_name $last_name";
      
      if($photo){
        $sql = "UPDATE users SET photo = '$photo' WHERE id = $id";
        $destination = "../assets/images/$photo"; 

        //save the image name to db
        if($this->conn->query($sql)){
          //save the file to images folder
          if(move_uploaded_file($tmp_photo, $destination)){
            header("location: ../views/dashboard.php");
            exit;
          }else{
            die("Error moving the photo.");
          }
        }else{
          die("Error uploading photo: " . $this->conn->error);
        }
      }
      header("location: ../views/dashoboard.php");
      exit;
    }else{
      die("Error updationg the your acccount: " . $this->conn->error);
    }
  }
 

  public function delete(){
    session_start();
    $id = $_SESSION['id'];

    $sql = "DELETE FROM users WHERE id = $id";

    if($this->conn->query($sql)){
      $this->logout();
    }else{
      die("Error deleting your account: " . $this->conn->error);
    }
  }

  //class
 }
?>