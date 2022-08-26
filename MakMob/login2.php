<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style2.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="index.html" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
       
        <form action="index.html" class="sign-up-form">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" />
          </div>
          <input type="submit" class="btn" value="Sign up" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>

          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="images/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="images/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>
 
  <script src="js/app.js"></script>
</body>
</html>
<?php
              $conn = mysqli_connect("localhost", "root", "", "LaptopIn");
              if(mysqli_connect_errno())
              {
                  echo "Failed to connect to MYSQL: ".mysqli_connect_error();
              }
              $pwd = md5($_POST['pwd']);
              $sql = "SELECT * FROM user1 WHERE uname='".$_POST['uname']."'";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
                  $dbpwd = $row['pwd'];
              }
              if($pwd == $dbpwd)
              {
                  echo "Password Matched, WELCOME ".$_POST['uname'];
              }
              else
              {
                  echo "Password didn't matched";
              }
?>

<?php
      $conn = mysqli_connect("localhost", "root", "", "LaptopIn");
      if(mysqli_connect_errno())
      {
          echo "Failed to connect to MYSQL: ".mysqli_connect_error();
      }

      $newpwd = md5($_POST['pwd']);
      $query = "INSERT INTO user1(uname, pwd) VALUES ('$_POST[uname]', '$newpwd')";
      // $query = "INSERT INTO user1(uname, pwd) VALUES ('$_POST[uname]', 'md5($_POST['pwd'])')";
      if(mysqli_query($conn, $query))
      {
          echo "New Record Created Successfully";
      }
      else
      {
          echo "Error: ".$sql."<br>".mysqli_error($conn);
      }
  ?>
  <?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["uname"];
    $password = $_POST["pwd"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from users where username='$uname'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($pwd, $row['pwd'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['uname'] = $uname;
                header("location: welcome.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>
<!-- As you can see in the code, I have written a new function called header, and we are using this new function to redirect to the desired page once we are logged in. Now to complete the login process, we need to open welcome.php and write a PHP script. On the PHP script, we will start a new session and check if the user has logged in to the session or not. And we will use another header to redirect to the login.php page if the user is not logged in.  -->

<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>



