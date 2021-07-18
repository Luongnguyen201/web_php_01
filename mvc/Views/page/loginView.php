<section style="margin-top:100px ;" class="form-group"  > 
    <h3 class=" text-center">Log in to your account</h3>
    <form action="/mvc/login/Login_User" method="post" style="margin-left:35vw;">
        <section class="form-group col-sm-6">
        <label for="Username"><b>User name</b></label>
            <input type="text" id="Username" name="Username" placeholder="Enter account name" class="form-control" required>
        </section>
        <section class="form-group col-sm-6">
        <label for="Password"><b>Password</b></label>
            <input type="password" id="Password" name="Password" placeholder="Enter password" class="form-control" required>
        </section>
        <br>
        <section class="form-group col-sm-6">
            <input type="submit" value="Login" name="login" class="btn btn-info col-md-5">&nbsp;
            <a href="#">Reset Password</a>&nbsp;-
            <a href="#">Forgot Password</a>
        </section>
        <section class="form-group col-sm-6 " style="margin-left:25vw;">
            <a  href="/mvc/register/Register_user" class="btn btn-info col-sm-2">Register</a>
        </section>
    </form>
</section>

<h4 style="text-align:center; font-size:15px; color:red">
    <?php
        echo $data['notice'];
    ?>
</h4>