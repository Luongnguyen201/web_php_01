<section class="form-group"  > 
    <h3 class=" text-center">Change password <?=$_SESSION['User']?></h3>
    <form action="/mvc/login/Change_Password" method="post" style="margin-left:35vw;">
        <section class="form-group col-sm-6">
            <label for="validationDefault02">Current password</label>
            <input type="hidden" name="Username" value="<?=$_SESSION['User']?>">
            <input type="password" name="Password" class="form-control" id="validationDefault02" placeholder="Password must have 6 characters"  maxlength="6" 
            pattern=".{6,}" title="Mật khẩu phải đủ 6 kí tự" required>
        </section>
        <section class="form-group col-sm-6">
            <label for="validationDefault02">Retype Pasword</label>
            <input type="password" name="rePassword" class="form-control" id="validationDefault02" placeholder="..."  required
            oninput="if(value!=Password.value){document.getElementById('checkpass').innerHTML='retype Password'}else{document.getElementById('checkpass').innerHTML=''}">
            <span id="checkpass" style="color:red"></span>
        </section>
        <section class="form-group col-sm-6">
            <label for="">New Password</label>
            <input type="password" name="Newpass" class="form-control" placeholder="Password must have 6 characters"  maxlength="6" 
            pattern=".{6,}" title="Mật khẩu phải đủ 6 kí tự" required>
        </section>
        <br>
        <section class="form-group col-sm-6">
            <input type="submit" value="Change Password" name="Updatepass" class="btn btn-info col-md-5">&nbsp;
            <a href="/mvc/register/Register_user">Register a new account</a>
        </section>
    </form>
</section>
<h5 style="text-align:center; font-size:18px; color:red">
    <?php
        echo $data['notice'];
    ?>
</h5>
<h3 style="text-align:center; font-size:18px; color:red">
    <?php
        if($data['result']==true){ echo "Success"; }
    ?>
</h3>

