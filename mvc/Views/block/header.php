<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <a style="color:aliceblue;"  class="navbar-brand" href="/mvc/Home">TV STORE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a style="color:aliceblue" class="nav-link" href="/mvc/login/History">Orders</a>
      </li>
    </ul>
    <div class="col-md-9">
        <form class="form-inline my-2 my-lg-0" method="POST" action="/mvc/Home">
          <input class="form-control mr-sm-2 col-md-10" type="search" name="Search"  placeholder="All" aria-label="Search">
          <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </form>
    </div>
    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
        <a class="btn btn-warning" href="/mvc/Cart/add_Cart">
          <svg xmlns="http://www.w3.org/2000/svg" style="color:#17a2b8" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg><?php if(isset($_SESSION['Cart'])){ $i=0; foreach(array_keys($_SESSION['Cart']) as $key){
                        $i+=1;
                    } echo "<b>(".$i.")</b>"; } ?>
        </a>
      </li>
    </ul>
    </div>
    <?php
          if(!isset($_SESSION['User'])):
      ?>
      <div>
        <div class="btn-group">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Account
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="/mvc/login/Login_User" class="dropdown-item" type="button">Sign in</a>
            <a href="/mvc/register/Register_user" class="dropdown-item" type="button">Sign up</a>
          </div>
        </div>
      <?php
        else :
      ?>
        <div class="btn-group">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$_SESSION['User']?>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="/mvc/login/History"  class="dropdown-item" type="button">Purchase history</a>
            <a href="/mvc/login/Change_Password" class="dropdown-item" type="button">Change Password</a>
            <a href="/mvc/login/Logout"  class="dropdown-item" type="button">Sign out</a>
          </div>
        </div>
      </div>
      <?php
        endif;
      ?>
  </div>
</nav>