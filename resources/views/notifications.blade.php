@extends('layouts.app')

@section('content')
  <title>Notifications</title>
    <link rel="stylesheet" href="../css/Notifications.css" />
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
    @vite('resources/js/app.js')
    <!--Font Links-->
    <!-- <main class="container-fluid"> 
              <div class="bids-table mt-2">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <-- <th scope="col"></th> ->
                      <th scope="col">Result</th>
                      <th scope="col">Auction ID</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody id="tbody1">
          
                    <tr>
                      <-- <td class="text-center"></td> ->
                      <td>Win</td>
                      <td>1</td>
                      <td><a href="Checkout.html" class="btn btn-success fs-12 mx-3">View</a></td>
                    </tr>

                    <tr>
                      <-- <td class="text-center"></td> ->
                      <td>Lose</td>
                      <td>2</td>
                      <td><a href="Checkout.html" class="btn btn-success fs-12 mx-3">View</a></td>
                    </tr>

                  </tbody>
                </table>
              </div>-->
<!-- new here -->

<main class="container">
      <p class="title text-center">Notifications</p>
      <!--START OF NOTIF-->
      <!-- <div class="winning-template">
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
        <a href="Checkout.html" class="btn btn-success fs-3 mx-3">Claim Here</a>
      </div> -->
      <table class="table table-striped table-bordered table-hover">
        <thead></thead>
        <tbody>
         @foreach($notif as $notify)
          <tr>
            <td>
                @if(Auth::user()->user_type == 2 )
                <a
                  href="{{ url('send-bid')}}?auction_id={{$notify->auction_id}}"
                  class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                >
                @elseif(Auth::user()->user_type == 3)
                <a
                  href="{{ url('congratulation')}}?auction_id={{$notify->auction_id}}"
                  class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                >
                @endif
                <img
                  src="../assets/winner.svg"
                  width="150px"
                  height="150px"
                  class="rounded-circle bg-white object-fit-fill"
                />
                <div>
                  <p class="md-title text-success">
                    @if(Auth::user()->user_type == 2 )
                        Your auction listing has ended
                    @elseif(Auth::user()->user_type == 3)
                        Congratulations! You won an auction!
                    @endif
                  </p>
                  <p class="sm-title text-secondary">
                    Auction ID: {{$notify->auction_id}}
                  </p>
                </div>
              </a>
            </td>
          </tr>
          @endforeach

          @if(Auth::user()->user_type == 2)
          @foreach($farmer_conpay as $fconpay)
          <tr>
            <td>
                <a
                  href="{{ url('checkut_farmer')}}?auction_id={{$notify->auction_id}}"
                  class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                >
                <img
                  src="../assets/transferMoney.png"
                  width="150px"
                  height="150px"
                  class="rounded-circle bg-white object-fit-fill"
                />
                <div>
                  <p class="md-title text-success">
                    Winning bidder just paid for your item,
                    Confirm Payment Now!
                  </p>
                  <p class="sm-title text-secondary">
                    Auction ID: {{$notify->auction_id}}
                  </p>
                </div>
              </a>
            </td>
          </tr>
          @endforeach
          @elseif(Auth::user()->user_type == 3)
          @foreach($notif as $notify)
          <tr>
            <td>
                <a
                  href="{{ url('finished')}}?auction_id={{$notify->auction_id}}"
                  class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                >
                <img
                  src="../assets/present.svg"
                  width="150px"
                  height="150px"
                  class="rounded-circle bg-white object-fit-fill"
                />
                <div>
                  <p class="md-title text-success">
                    Farmer just confirmed your payment! Claim your Item Now!
                  </p>
                  <p class="sm-title text-secondary">
                    Auction ID: {{$notify->auction_id}}
                  </p>
                </div>
              </a>
            </td>
          </tr>
          @endforeach
          @endif
          <!--Payment Confirmed Notification 
          @foreach($notif as $notify)
          <tr>
            <td>
              <a
                href="{{ url('finish')}}?auction_id={{$notify->auction_id}}"
                class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
              >
                <img
                  src="../assets/present.svg"
                  width="150px"
                  height="150px"
                  class="rounded-circle bg-white object-fit-fill"
                />
                <div>
                  <p class="md-title text-success">
                    Farmer just confirmed your payment! Claim your Item Now!
                  </p>
                  <p class="sm-title text-secondary">
                    Auction ID: {{$notify->auction_id}}
                  </p>
                </div>
              </a>
            </td>
          </tr>
          @endforeach
          Payment Confirmed Notification -->
          <!--Payment Confirmed Notification -->
          <!-- @foreach($notif as $notify)
          <tr>
            <td>
              <a
                href="{{ url('confirm_payment')}}?auction_id={{$notify->auction_id}}"
                class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
              >
                <img
                  src="../assets/present.svg"
                  width="150px"
                  height="150px"
                  class="rounded-circle bg-white object-fit-fill"
                />
                <div>
                  <p class="md-title text-success">
                    Please Confirm the Payment of Farmer {{$notify->creator_id}}
                  </p>
                  <p class="sm-title text-secondary">
                    Auction ID: {{$notify->auction_id}}
                  </p>
                </div>
              </a>
            </td>
          </tr>
          @endforeach -->
          <!--Payment Confirmed Notification -->
        </tbody>
      </table>
    </main>

    <!--Font Links->
    <main class="container bg-light">
      <p class="title">Notifications</p>
      !--START OF NOTIF->
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
        <a href="Checkout.html" class="btn btn-success fs-3 mx-3">Claim Here</a>
      </div>
    </main>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    window.Echo.channel('notification{{ Auth::user()->id }}').listen('.notifier.message', (data) => {
        // Update UI with received message
        let auction = data.auction;
        let crop = data.crop;
        let creator = data.creator;
        let bidder_id = data.bidder;

        let row = document.createElement("tr");


        let name = document.createElement("td");
        name.innerHTML = `
                          @foreach($notif as $notify)
                          <a
                            href="{{ url('congratulation')}}?auction_id={{$notify->auction_id}}"
                            class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                          >
                                <img
                                  src="../assets/` + crop +`.jpeg"
                                  width="150px"
                                  height="150px"
                                  class="rounded-circle bg-white object-fit-fill"
                                />
                                <p class="md-title text-success">
                                  Congratulations! You won an auction!` + crop +`
                                </p>
                          </a>
                          @endforeach`;
        row.appendChild(name);
        
        /*let auct = document.createElement("td");
        auct.innerText = auction;
        row.appendChild(auct);

        //const d = new Date();
        let date = document.createElement("td");
        date.innerHTML = '<a href="Checkout.html" class="btn btn-success fs-12 mx-3">View</a>';
        row.appendChild(date);*/

        $("tbody").prepend(row);


    });
    /*
     function pushBid(e){
              e.preventDefault();
              console.log($('#form_data'));
              var bid = $('#form_data')[0];
              var bidFormData = new FormData(bid);

              //$('.formErrors').html('');
              $.ajax({
                method:"POST",
                url:"{{ url('send-message')}}",
                data:bidFormData,
                processData:false,
                contentType:false,
                success:function(response){
                },
                error:function(error){
                  var formErr = error.responseJSON.errors;
                  console.log(error);
                  for(var err in forErr){
                    $('.'+ err + '_err').html(formErr[err][0]);
                  }
                }
              })
            }

            //test1

                <script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    window.Echo.channel('notification').listen('.notifier.message', (data) => {

      console.log(data.auction);
        // Update UI with received message
        let auction = data.auction;
        let crop = data.crop;
        let creator = data.creator;

        let row = document.createElement("tr");


        let auctiontd = document.createElement("td");
        auctiontd.innerText = auction;
        row.appendChild(auctiontd);
        
        let croptd = document.createElement("td");
        croptd.innerText = crop;
        row.appendChild(croptd);

        let creatortd = document.createElement("td");
        creatortd.innerText = creator;
        row.appendChild(creatortd);

        $("tbody").prepend(row);
    });*/

</script>
          
</script>


</main>
@endsection
