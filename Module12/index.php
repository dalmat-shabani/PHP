<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 

  </head>
  <body>

 <!--   <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>
</form> --> 

<div calss="signup">
    <form class="form-signin" action="register.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Please SignUp</h1>
        <label for="inputemail" class="sr-only">Name</label>
        <input type="text" id="imputEmail" class="form-control" placegolder="Name" name="name" requires autofocus>


        <label for="inputemail" class="sr-only">Last Name</label>
        <input type="text" id="imputEmail" class="form-control" placegolder="Name" name="name" requires autofocus>


        <label for="inputemail" class="sr-only">Email</label>
        <input type="text" id="imputEmail" class="form-control" placegolder="Name" name="name" requires autofocus>


        <label for="inputemail" class="sr-only">Password</label>
        <input type="text" id="imputEmail" class="form-control" placegolder="Name" name="name" requires autofocus>

        <button class="btn btn-lg -btn-primary btn-block" type="submit" name="submit">Sign Up</button>

        <small>Arledy have account?<a href="login.php">Log In</a></small>

        <p class="mt-5 mb-2 text-muted">Digital School</p>
    </form>
 
</div>

  </body>
</html>