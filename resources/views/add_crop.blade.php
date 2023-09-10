<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create New Auction</title>
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
    <link rel="stylesheet" href="../css/createAuction.css" />
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
  </head>
  <body>
    <!--Navigation Bar-->
    <nav
      class="navbar nav-underline sticky-lg-top navbar-expand-xxl bg-body-tertiary"
    >
      <div class="container-fluid">
        <a
          class="navbar-brand d-flex align-items-center text-success"
          id="brand"
          href="#"
          ><img src="../assets/logo-nobg.png" class="img-fluid logo-pic" />
          <p class="title">Agrikultur'App</p></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon fs-1"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav ms-auto mb-2 mb-lg-0 text-end d-flex align-items-xxl-center"
          >
            <li class="nav-item me-2">
              <a
                class="nav-link active text-success"
                id="nav-link"
                aria-current="page"
                href="AuctionPage.html"
                ><i class="fa-solid fa-gavel"></i> Auction Page</a
              >
            </li>
            <li class="nav-item d-block d-xxl-none">
              <a
                class="nav-link text-success"
                href="Notifications.html"
                id="nav-link"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
            </li>
            <li class="nav-item me-2">
              <a
                class="nav-link text-success"
                href="Guidelines.html"
                id="nav-link"
                ><i class="fa-solid fa-table"></i> Pricing Guidelines</a
              >
            </li>
            <li class="nav-item">
              <p class="desc text-end d-block d-xxl-none">
                Logged In as:
                <strong
                  ><a
                    href="Profile.html"
                    class="nav-link text-success text-decoration-underline"
                    >{{ Auth::user()->name }}</a
                  ></strong
                >
              </p>
            </li>

            <li class="nav-item me-2">
              <!-- Logout from built-in auth on laravel -->
              <a class="btn btn-success w-auto fs-3 d-block d-xxl-none float-end" href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>{{ __('Sign Out') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
              </form>
              <!-- end > Logout from built-in auth on laravel -->
            </li>
          </ul>
          <div class="nav-pic d-none d-xxl-block btn-group dropdown">
            <button
              type="button"
              class="btn dropdown-toggle d-flex align-items-center w-100 h-100"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                src="../assets/avatar1.svg"
                class="rounded-circle object-fit-fill"
                width="100%"
                height="100%"
              />
            </button>
            <div
              class="dropdown-menu fs-3"
              id="dropdown-menu"
              aria-labelledby="dropdownMenuButton"
            >
              <a class="dropdown-item text-success" href="Profile.html"
                ><i class="fa-solid fa-user"></i> Profile</a
              >
              <a class="dropdown-item text-success" href="#"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
              <div class="dropdown-divider"></div>
              
              <a class="btn btn-success w-100 fs-3" href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>{{ __('Sign Out') }}
              </a>

            </div>
          </div>
        </div>
      </div>
    </nav>
    <!--Navigation Bar-->
    <p  class=" text-success">Add Crops</p>
    <!--Create Form Section-->
    <section class="container-fluid create-form-section">
      <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center">
          <div class="card mt-5 form-card">
            <div class="card-body">
              <form class="d-flex flex-column" id="createForm" action="{{ route('newCrop') }}" method="POST">
                <!--Select Input-->
                @csrf
    
                <!--Crop Name-->
                <div class="input-group mb-3 bg-transparent">
                    <input
                      onkeyup="btnDis()"
                      name="crop_name"
                      id="crop_volume"
                      type="text"
                      class="form-control fs-1 bg-transparent text-light"
                      placeholder="Crop Name"
                      aria-label="Volume"
                      required
                    />
                </div>
                <!--Crop Name-->

                <!--Suggested Price-->
                <div class="input-group mb-3">
                  <span id="peso-sign" class="input-group-text fs-1 bg-success text-light">₱</span>
                      <input
                        onkeyup="btnDis()"
                        name="suggested_price"
                        id="crop_price"
                        type="number"
                        class="form-control fs-1 bg-transparent text-light"
                        placeholder="Suggested Price"
                        aria-label="Price"
                        required
                      />
                </div>
                <!--Suggested Price-->

                <div class="d-flex justify-content-between mt-3">
                  <!--Utility Buttons-->
                  <a
                    id="back-btn"
                    class="btn text-light bg-transparent align-self-end w-50 fs-1"
                    href="javascript:history.back()"
                  >
                    Back
                  </a>
                  <button
                    type="submit"
                    id="form-btn"
                    onclick="confirmSubmit()"
                    class="btn btn-success align-self-end w-50 fs-1"
                  >
                    Submit
                  </button>
                  <!--Utility Buttons-->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Create Form Section-->
  </body>
</html>
