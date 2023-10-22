<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pending User</title>
    <link rel="stylesheet" href="../css/Login.css" />
    <!-- Boostrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <main class="container bg-body-tertiary p-5 login_cont">
      <!--Image Container-->
      <div class="row">
        <div class="col d-none d-lg-block my-auto">
          <img
            class="img-fluid"
            src="../assets/login2.svg"
            alt="Login Pic"
            lazy
          />
        </div>
        <!--Form Container-->
        <div class="col mx-auto p-4 d-flex flex-column justify-content-center border border-black">
            <h1 class="form-label text-center text-underline text-success">Your request is being processed</h1>
            <br>
            <p class="fw-bold">Wait for the admin to activate your account. <br>Try logging in after 1 hour.</p>
            <br>
            <small
              class="text-end">Try to login? <a href="{{ route('login') }}">Login</a></small
            >
        </div>
       
      </div>
    </main>
    <script src="../index.js"></script>
  </body>
</html>
