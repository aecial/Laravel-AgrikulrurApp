@extends('layouts.app')

@section('content')
  <title>Auction Page</title>
    <!--Custom CSS Tag-->
    <link rel="stylesheet" href="../css/auction.css" />
    <!--Custom CSS Tag-->

    <!--Bootstrap CSS Tag-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <!--Bootstrap CSS Tag-->

    <!--Bootstrap JS Tag-->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <!--Bootstrap JS Tag-->
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

    <!--Titles-->
    <p class="title text-center mt-5 mb-5">
      Welcome to the <span class="text-success">Auction Page</span>
    </p>
    <p class="md-title text-start mx-4">Offered Produce Auctions</p>
    <!--Titles-->

    <!--Offered Produce Section-->
    <section class="offered-produce container-fluid p-5" id="offered">
      <!--2 Arrows Div-->
      <div class="float-end d-lg-none text-light">
        <i class="fa-solid fa-chevron-right"></i>
        <i class="fa-solid fa-chevron-right"></i>
      </div>
      <!--2 Arrows Div-->

      <!--Mobile View-->
      <div class="d-block d-xxl-none">
        <!--Mobile Pill Navigation-->
        <ul
          class="nav crop-type-selection justify-content-center nav-pills mb-3 fs-3 text-success"
          id="pills-tab"
          role="tablist"
        >
        
          
      
          @foreach($crops as $crop)
            <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-kalabasa-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-{{$crop->crop_id}}"
                  type="button"
                  role="tab"
                  aria-controls="pills-{{$crop->crop_id}}"
                  aria-selected="false"
                >
              {{$crop->crop_name}}
              </button>
            </li>
          @endforeach


        </ul>
        <!--Mobile Pill Navigation-->

        <!--Mobile Pill Content-->
        <div
          class="tab-content d-flex justify-content-center"
          id="pills-tabContent"
        >


          @foreach($crops as $crop)
            <div class="tab-pane fade" id="pills-{{$crop->crop_id}}" role="tabpanel"  aria-labelledby="pills-{{$crop->crop_id}}-tab" tabindex="0">
              <div class="card" style="width: 30rem">
                <img class="card-img-top" src="../assets/Kalabasa.jpg" alt="Card image cap"/>
                <div class="card-body">
                  <h5 class="card-title md-title">{{$crop->crop_name}}</h5>
                  <a href="{{ url('auctions') }}?type={{$crop->crop_id}}" class="btn btn-success">View Auctions</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!--Mobile Pill Content-->
      </div>
      <!--Mobile View-->

      <!--Desktop View-->
      <div class="row row-cols-5 row-gap-5 d-none d-xxl-flex">
        @foreach($crops as $crop)
            <div class="col">
              <div class="card">
                <img src="../assets/Ampalaya.jpeg" class="card-img-top" alt="" />
                <div class="card-body">
                  <h5 class="card-title md-title">{{$crop->crop_name}}</h5>
                  <a href="{{ url('auctions') }}?type={{$crop->crop_id}}" class="btn btn-success">View Auctions</a>
                </div>
              </div>
            </div>
        @endforeach
<!--  
        <div class="col">
          <div class="card">
            <img src="../assets/Kalabasa.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Kalabasa</h5>

              <a href="Kalabasa.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/Tomato.png" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Kamatis</h5>
              <a href="Kamatis.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/Okra.jpeg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Okra</h5>
              <a href="Okra.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/sigarilyas.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Sigarilyas</h5>
              <a href="Sigarilyas.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/sitaw.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Sitaw</h5>
              <a href="Sitaw.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>
      </div>
-->
      <!--Desktop View-->
    </section>
    <!--Offered Produce Section-->
@endsection
