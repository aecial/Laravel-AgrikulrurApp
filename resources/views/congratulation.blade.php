@extends('layouts.app')

@section('content')
    <title>Claim Item</title>
    <link rel="stylesheet" href="../ccs/Notifications.css" />
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
    <script
      src="https://kit.fontawesome.com/fae056ab45.js"
      crossorigin="anonymous"
    ></script>
    <!--Font Links-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap"
      rel="stylesheet"
    />
    <!--Font Links-->

    
    <main class="container bg-light p-5">
      <!--START OF NOTIF-->
      <div class="winning-template">
        <div
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img src="../assets/celebrate.svg" alt="" class="img-fluid" />
          <p class="md-title">Congrats you won an Auction!</p>
        </div>
        <p class="desc fw-bold">Hello Teddy,</p>
        <p class="desc">
          Congratulations on being the winning bidder! To claim your products,
          please click the button below.
        </p>
        <a href="{{url('checkout')}}" class="btn btn-success fs-3 mx-3">Claim Here</a>
      </div>
    </main>
@endsection