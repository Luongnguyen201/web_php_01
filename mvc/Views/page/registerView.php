<form style="margin-top:73px;" action="./Register_user" method="POST" >
<h3 class="text-center">Register Account</h3>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">User Name</label>
      <input type="text" name="Username" class="form-control" id="validationDefault01" placeholder="User name" pattern=".{5,}" title="Tên tài khoản phải đủ 5 kí tự" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Password</label>
      <input type="password" name="Password" class="form-control" id="validationDefault02" placeholder="Password must have 6 characters"  maxlength="6" 
       pattern=".{6,}" title="Mật khẩu phải đủ 6 kí tự" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Retype Pasword</label>
      <input type="password" name="rePassword" class="form-control" id="validationDefault02" placeholder="..."  required
      oninput="if(value!=Password.value){document.getElementById('checkpass').innerHTML='retype Password'}else{document.getElementById('checkpass').innerHTML=''}">
      <span id="checkpass" style="color:red"></span>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault03">Full Name</label>
      <input type="text" name="Fullname" class="form-control" id="validationDefault03" placeholder="Full name" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefaultUsername">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">@</span>
        </div>
        <input type="text" name="Email" class="form-control" id="validationDefaultUsername" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" title="Điền đúng Email" placeholder="@gmai.com" value="@gmail.com" aria-describedby="inputGroupPrepend2" required>
      </div>
    </div>
    <div class="col-md-4 mb-3">        
      <label for="validationDefault04">Phone Number</label>
      <input type="text" name="Number_phone" class="form-control" id="validationDefault04" pattern="\d{10,13}" title="Điền đúng số điện thoại" placeholder="Phone Number" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault05">Address</label>
      <input type="text" name="Address" class="form-control" id="validationDefault05" placeholder="Address" required>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check text-center">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
      Agree to the terms and conditions
      </label>
    </div>
  </div>
  <button style="margin-left:40vw;" class="btn btn-primary col-md-2" name="Register" type="Register">Đăng Ký</button>
</form>
<h6 style="color:red; margin-left:40vw;">
    <?php
        if(isset($data['result'])){
            if($data['result']==true){
                echo "Sign Up Success<br>";
            ?>
      <form action="/mvc/login/Login_User" method="POST" style="margin-top:10px">
            <input type="hidden" name="Username" value="<?=$data['Username']?>">
            <input type="hidden" name="Password" value="<?=$data['Password']?>">
            <input type="submit" class="btn btn-warning btn-sm" value="Log in now" name="login">
      </form>        
    <?php     
            }else{
              ?>     
            <h5 class="text-center" style="color:red;">Registration failed. This account has already existed!</h5>
            <?php
            }
        }
    ?>
</h6>