@extends('layouts.app')

@section('content')
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/Checkout.css" />
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
    <main>
      <div class="container-fluid">
        <div class="row vh-100 row-cols-1 row-cols-lg-2">
          <div class="col payment-col">
            <p class="title text-light">Payment Method</p>
            <div class="input-group w-50 mb-lg-5">
              <div class="input-group-prepend">
                <div class="input-group-text h-100">
                  <input
                    type="radio"
                    aria-label="Radio button for following text input"
                    checked
                  />
                </div>
              </div>
              <input
                type="text"
                class="form-control fs-1 text-white"
                aria-label="Text input with radio button"
                readonly
                value="Gcash"
              />
            </div>
            <div
              class="d-flex flex-column justify-content-center mx-5 p-5 mb-lg-5"
            >
            <!-- @foreach($auctions as $auction) 
              <p class="title text-light">Name: {{$auction->user_id}}</p>
            @endforeach-->

            @foreach($users as $user) 
              <p class="title text-light">Name: {{$user->name}}</p>
            @endforeach
            @foreach($users as $user)
              <p class="title text-light">Gcash: {{$user->phone}}</p>
           
              <div class="input-group mb-3 fs-1">
                <input
                  type="text"
                  class="form-control fs-1 fw-bold text-light"
                  value="{{$user->phone}}"
                  aria-describedby="basic-addon2"
                  readonly
                  id="num"
                />
                
                <div class="input-group-append">
                  <button
                    class="btn btn-outline-light bg-transparent fs-1"
                    type="button"
                    onclick="copy()"
                  >
                    <i class="fa-solid fa-copy text-white"></i>
                    Copy
                  </button>
                </div>
              </div>
              @endforeach
            </div>
            <div class="container-fluid bg-light">
              <p class="title text-success">
                Open Gcash app and send the total amount to the number provided
                above and then comeback and click "Transferred"
              </p>
            </div>
          </div>
          <div class="col billing-col">
            <p class="title">Payment Details:</p>
            <div
              class="container-fluid p-5 d-flex flex-column justify-content-between h-75"
            >
              <div>
              @foreach($auctions as $auction) 
                  <p class="title mb-5">
                    Auction Id:
                    <span class="fw-bold" id="auction-id">{{$auction->auction_id}}</span>
                  </p>
              @endforeach
                
                <div
                  class="d-flex flex-column flex-lg-row justify-content-evenly align-items-center"
                >
                  <img
                    src="../assets/Ampalaya.jpeg"
                    alt=""
                    style="width: 30rem"
                  />
                  @foreach($crops as $crop)
                  <p id="crop-type" class="fs-1 fw-bold mx-2">{{$crop->crop_name}}</p>
                  @endforeach
                  <p class="fs-1 fw-semibold" id="volume">{{$auction->crop_volume}}kg</p>
                </div>
              </div>
              <div>
                <div class="border-top">
                  <p class="title text-end">
                    Total:
                    <span class="text-success" id="total">{{$total}}</span>
                  </p>
                </div>
                
                <!-- <a
                  class="btn btn-success fs-1 w-100"
                  href="{{ url('finish')}}?auction_id={{$auction->auction_id}}"
                  >Transferred</a
                > -->
                <!-- Button trigger modal -->
<button type="button" class="btn btn-success fs-1 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Transferred
</button>

<!-- Modal -->
<div class="modal fade fs-1" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="staticBackdropLabel">Farmer Confirmation Pending</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Wait for farmer to confirm your payment or you may contact <br>
        {{$user->name}} (Farmer) <br>
        Phone Number : <a href="tel:{{$user->phone}}">{{$user->phone}}</a> 
        <br>
        for faster transaction
        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Close</button>
        <a href="{{ url('bidder_payment')}}?auction_id={{$auction->auction_id}}" class="btn btn-success fs-3">Understood</a>
      </div>
    </div>
  </div>
</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="../js/copy.js"></script>
@endsection