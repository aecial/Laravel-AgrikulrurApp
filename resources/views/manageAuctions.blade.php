@extends('layouts.adminApp')

@section('admin')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auction Management</title>
    <link rel="stylesheet" href="../css/ManageAuctions.css" />
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

    <main class="container-fluid overflow-x-scroll">
      <!--Header-->
      <div class="d-flex justify-content-between align-items-center">
        <p class="title">Active Listings</p>
        <form class="d-flex gap-2">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search ID"
            aria-label="Search"
            id="myInput"
            onkeyup="myFunction2()"
          />
        </form>
      </div>

      <table class="table" id="myTable">
        <thead class="bg-success">
          <tr>
            <th scope="col" class="bg-success text-light">Auction Id</th>
            <th scope="col" class="bg-success text-light">Crop Type</th>
            <th scope="col" class="bg-success text-light">Date</th>
            <th scope="col" class="bg-success text-light">Owner</th>
            <th scope="col" class="bg-success text-light">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($auctions as $auction)
            <tr>
              <td>{{ $auction->auction_id}}</td>
              <td>{{ $auction->user_id}}</td>
              <td>{{ $auction->created_at}}</td>
              <td>{{ $auction->user_id}}</td>
              <td>
                <!-- <button class="btn btn-outline-danger">Remove Auction</button> -->
                <a href="{{url('rmAuction')}}?auction_id={{ $auction->auction_id}}" class="btn btn-outline-danger">Remove Auction</a>
              </td>
            </tr>
          @endforeach

          <!-- <tr>
            <td>123156422312</td>
            <td>Sitaw</td>
            <td>January 23-24 7am</td>
            <td>Denmark</td>
            <td>
              <button class="btn btn-outline-danger">Remove Auction</button>
            </td>
          </tr> -->
        </tbody>
      </table>
    </main>
    <script src="../js/auctionSearch.js"></script>
@endsection
