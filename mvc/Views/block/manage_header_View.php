<header class="row p-3 m-0" style="background-color: #6c757d;">
        <div class="col col-sm-2 text-center"><span style="font-size:20px;color: white;">Nguyễn Văn Lượng</span></div>
        <div class="col col-sm-8">  
            <div class="search-box">
                <input type="text"  placeholder="Search for..." style="border: none; border-radius: 4px;background-color: cornsilk; width: 300px;" class="pl-2">
                <a href="#">
                    <i class="fa fa-search search1 p-2"   href="#login-box"></i>
                </a>
            </div> 
        </div>
        <div class="col col-sm-1 bdr">
            <div class="mt-2">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell text-white" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                    </svg>
                    <span class="badge rounded-pill bg-danger text-white animation-trs">2</span>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope text-white" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                    </svg>
                    <span class="badge rounded-pill bg-danger text-white animation-trs">2</span>
                </a>
            </div>
            
        </div>
        <div class="col col-sm-1">
            <?php
                if(isset($_SESSION['User_Nd'])){
            ?>
                <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$_SESSION['User_Nd']?>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="/mvc/admin/Logout" class="dropdown-item" type="button">Sign out</a>
                </div>
                </div>
            <?php    
                }else{
            ?>
            <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/mvc/admin/Login_User" class="dropdown-item" type="button">Sign in</a>
            </div>
            </div>
            <?php } ?>
        </div>
</header>