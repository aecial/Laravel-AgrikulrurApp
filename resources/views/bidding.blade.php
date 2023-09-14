@extends('layouts.app')

@section('content')

  <title>Bidding Page</title>
    <link rel="stylesheet" href="../css/Bidding.css" />
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
   
    <main class="container-fluid">
      <div class="row main-row">
        <!-- Mobile Container -->
        <div class="col main-cont d-lg-none">
          <div
            class="row bg-light border-bottom border-black h-50 d-flex flex-lg-column justify-content-center align-items-center p-4"
          >
            <img src="../assets/sitaw.jpg" alt="" class="mb-2" id="bid-image" />
          </div>
          <div class="row bg-light row-cols-2 p-2">
            <div class="col border-end border-black">
              <p class="mt-2">Creator</p>
              <div class="d-flex align-items-center">
                <img
                  src="../assets/devTeam/Darren.png"
                  alt=""
                  class="rounded-circle m-2"
                  style="width: 50px"
                />
                @foreach($auctions as $auction)
                <p class="fs-5 fw-bold">{{ $auction->user_id }}</p>
                @endforeach
                <!-- <p class="fs-5 fw-bold">Darren Ventura</p> -->
              </div>
              <p>Base Bid Price: 

               @foreach($auctions as $auction)
                    <span id="bp2">{{ $auction->starting_price }}</span>
               @endforeach
              
              </p>
            </div>
            <div class="col border-black">
              <p class="mt-2">Ending In</p>
              <div class="d-flex align-items-center">
                @foreach($auctions as $auction)
                  <p class="fs-1 fw-bold mt-3">{{ $auction->created_at }}</p>
                @endforeach
              </div>
              <p class="mt-3">
                Latest Bid Price:
           

                  <span class="fw-bold" id="lbp">{{ $highestbid->bid_amount }}</span>

              </p>
            </div>
          </div>
          <div
            class="col cta-col bg-light pb-4 border-top border-2 border-black"
          >
            <p class="title text-start">Top Bidders</p>
            <div class="row bids-row bg-light-subtle mb-4">
              <div class="bids-table mt-2">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Name</th>
                      <th scope="col">Bid Amount</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody id="tbody1">
                  @foreach($bids as $bid) 
                    <tr>
                        <td class="text-center">
                          <img
                            src="/assets/Teddy.jpg"
                            alt=""
                            class="rounded-circle"
                            id="table-img"
                          />
                        </td>
                        <td>{{ $bid->user_id }}</td>
                        <td>₱ {{ $bid->bid_amount }}</td>
                        <td>{{ $bid->created_at }}</td>
                    </tr>
                  @endforeach
  
                    <!-- <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>

                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
            <div
              class="row cta-row d-flex justify-content-center mb-2 mt-2 mt-lg-5"
            >
              <div
                class="border border-black w-75 d-flex justify-content-center align-items-center p-2 gap-2"
              >
                <input
                  type="number"
                  class="form-control border-0 bg-transparent text-center"
                  id="inputPrice"
                  placeholder="Enter Your Bid"
                  
                /><!-- onkeyup="al()" -->
                <button
                  class="btn btn-success"
                  id="bid-btn"
                ><!-- onclick="lezgo()" -->
                  Bid
                </button>
              </div>
            </div>
            <p class="fs-5 fw-light text-center text-secondary">
            Auction Id:
                  @foreach($auctions as $auction)
                  {{ $auction->auction_id }}
                  @endforeach
            </p>
          </div>
        </div>
        <!-- Mobile Container -->

        <!-- Web  Container -->
        <div class="col d-none d-lg-block p-5">
          <div class="row row-cols-2">
            <div class="col">
              <div
                class="d-flex justify-content-center align-items-center gap-5"
              >
                <div class="d-flex align-items-center">
                  <img
                    src="../assets/devTeam/Darren.png"
                    alt=""
                    class="rounded-circle m-2"
                    style="width: 50px"
                  />
                  @foreach($auctions as $auction)
                    <p class="desc fw-bold">{{ $auction->user_id }}</p>
                    <!-- <p class="fs-5 fw-bold"></p> -->
                  @endforeach
                  <!-- <p class="desc fw-bold">Darren Ventura</p> -->
                </div>
                <h1>|</h1>
                <h1>
                  Auction Id:
                  @foreach($auctions as $auction)
                  {{ $auction->auction_id }}
                  @endforeach
                </h1>
              </div>
              <div class="web-img-cont bg-danger-subtle overflow-hidden mb-2">
                <img
                  src="../assets/sigarilyas.jpg"
                  alt=""
                  id="web-img"
                  class="w-100 h-100 object-fit-cover"
                />
              </div>
              <div
                class="d-flex justify-content-center align-items-center gap-5"
              >
                <p class="desc">Base Bid Price:
                  @foreach($auctions as $auction)
                    <span id="bp2">{{ $auction->starting_price }}</span>
                  @endforeach
                </p>

                <p class="desc">|</p>

                <p class="desc">Latest Bid Price: 
                  
                    <span id="lbp2">{{ $highestbid->bid_amount }}</span>
              
                </p>

              </div>
            </div>
            <div class="col border border-2 border-tertiary-subtle pb-2">
              <p class="title text-center">Sigarilyas</p>
              <p class="title text-success"><span id="lbp3">{{ $highestbid->bid_amount }}</span></p>
              @foreach($auctions as $auction)
                  <!-- <p class="fs-1 fw-bold mt-3">{{ $auction->created_at }}</p> -->
                  <p class="md-title">Bidding will end at: {{ $auction->created_at }}</p>
                @endforeach
              @foreach($auctions as $auction)
              <p class="md-title">Volume: {{ $auction->crop_volume}}kg</p>
              @endforeach
              <div class="d-flex flex-column align-items-center">
                <p class="title">Top Bidders</p>
                <div class="row bids-row bg-light-subtle mb-4 w-100">
                  <div class="bids-table mt-2">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Name</th>
                          <th scope="col">Bid Amount</th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody id="tbody2">
                      @foreach($bids as $bid) 
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>{{ $bid->user_id }}</td>
                          <td>₱ {{ $bid->bid_amount }}</td>
                          <td>{{ $bid->created_at }}</td>
                        </tr>
                      @endforeach
                        <!-- <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="w-100 px-5 d-flex flex-column gap-2 mt-5">
                  <input
                    type="number"
                    name="desktop"
                    id="inPriceDesk"
                    class="form-control border-black text-center fs-1"
                    
                  /><!-- onkeyup="al2()" -->
                  <button
                    type="submit"
                    id="bid-btn2"
                    class="w-100 btn btn-success fs-1"
                    
                  ><!-- onclick="lezgo2()" -->
                    Bid
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {

        //para sa Web toh par

            $('#bid-btn2').click(function() {
                var message = $('#inPriceDesk').val();
                if (message.trim() !== '') {
                    // AJAX request to send the message to the server
                    $.ajax({
                        method: 'GET',
                        url: '/send-message', // Replace with your route
                        data: 
                        { 
                          message: message,
                          channel: @foreach($auctions as $auction){{ $auction->auction_id }}@endforeach,
                          bidder: {{ Auth::user()['id'] }},
                        },
                        success: function(response) {
                            // Handle success if needed
                            console.log('Message sent successfully: ', response);
                        },
                        error: function(xhr, status, error) {
                            // Handle error if needed
                            console.log('Error sending message: ', error);
                        }
                    });
                }
            });

            //Mobile toh par. ala pa ako naisip na logic para onti lang yung code sana

            $('#bid-btn').click(function() {
                var message = $('#inputPrice').val();
                if (message.trim() !== '') {
                    // AJAX request to send the message to the server
                    $.ajax({
                        method: 'GET',
                        url: '/send-message', // Replace with your route
                        data: 
                        { 
                          message: message,
                          channel: @foreach($auctions as $auction){{ $auction->auction_id }}@endforeach,
                          bidder: {{ Auth::user()['id'] }},
                        },
                        success: function(response) {
                            // Handle success if needed
                            console.log('Message sent successfully: ', response);
                        },
                        error: function(xhr, status, error) {
                            // Handle error if needed
                            console.log('Error sending message: ', error);
                        }
                    });
                }
            });




  });
</script>
<script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    @foreach($auctions as $auction)
    window.Echo.channel('chat{{ $auction->auction_id }}').listen('.recieve.message', (data) => {
        // Update UI with received message
        let inputPrice2 = data.message;
        let bidder_id = data.bidder;

        let row = document.createElement("tr");

        let imagecol = document.createElement("td");
        imagecol.classList.add("text-center");

        let image = document.createElement("img");
        image.src = "../assets/Teddy.jpg";
        image.classList.add("rounded-circle");
        image.id = "table-img";
        imagecol.appendChild(image);
        row.appendChild(imagecol);

        let name = document.createElement("td");
        name.innerText = `${bidder_id}`;
        row.appendChild(name);
        
        let price = document.createElement("td");
        price.innerText = `₱ ${inputPrice2}`;
        row.appendChild(price);

        //const d = new Date();
        let date = document.createElement("td");
        date.innerText = '{{ $bid->created_at }}';
        row.appendChild(date);

        //tbody1.append(row);
        //tbody2.append(row);
        $("tbody").prepend(row);

        let latestprice2 = inputPrice2;
        lbp2.innerText = `${latestprice2}`;
        lbp3.innerText = `${latestprice2}`;
        lbp.innerText = `${latestprice2}`;
        lbp.innerText = `${latestprice2}`;

  
        //inputPrice2.value = null;
        //btn2.disabled = true;

    });
    @endforeach
</script>
      <!-- <script src="../js/biddings.js"></script> -->
    </main>
@endsection
