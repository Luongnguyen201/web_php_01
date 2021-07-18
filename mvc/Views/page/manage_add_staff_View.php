<div class="col-md-9">
        <section style="margin-left:5vw;" class="section-ql " style="width:85%;">
            <div class="text-center p-2 shd-ql"> 
                <span class="tt-ql">
                   Thêm người dùng - nhân viên
                </span> 
            </div>
            <form action="/mvc/admin/Add_Staff" method="POST">
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">
                            <span style="color: rgb(255, 0, 0);" >Detail</span>
                            
                            <!-- nhà cc -->
                            <div class="form-group">
                                <label for="validationDefault01">User Name</label>
                                <input type="text" name="Username" class="form-control" id="validationDefault01" placeholder="User name" pattern=".{5,}" title="Tên tài khoản phải đủ 5 kí tự" required>
                            </div>
                            <div class="form-group">
                                <label for="validationDefault02">Password</label>
                                <input type="password" name="Password" class="form-control" id="validationDefault02" placeholder="Password must have 6 characters"  maxlength="6" 
                                pattern=".{6,}" title="Mật khẩu phải đủ 6 kí tự" required>
                            </div>
                        
                            <div class="row">
                                <div class="col">
                                    <!-- ngày nhập -->
                                    <div class="form-group"></div>
                                        <label for="validationDefault02">Retype Pasword</label>
                                        <input type="password" name="rePassword" class="form-control" id="validationDefault02" placeholder="..."  required
                                        oninput="if(value!=Password.value){document.getElementById('checkpass').innerHTML='retype Password'}else{document.getElementById('checkpass').innerHTML=''}">
                                        <span id="checkpass" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Trạng thái -->
                                    <div class="form-group">
                                        <label for="validationDefault03">Full Name</label>
                                        <input type="text" name="Fullname" class="form-control" id="validationDefault03" placeholder="Full name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="validationDefault04">Phone Number</label>
                                        <input type="text" name="Number_phone" class="form-control" id="validationDefault04" pattern="\d{10,13}" title="Điền đúng số điện thoại" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>                       
                        </div>                              
                    </div>
                    <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">  
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nhanvien">Chức vụ</label>
                                        <select class="form-control" name="Chuc_vu" id="">
                                            <option value="<?=1?>">Quản lý</option>
                                            <option value="<?=2?>">Nhân viên bán hàng và kho</option>
                                        </select>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="pb-5">
                        <hr>
                        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                        <h4 class="text-center" style="color:red">
                        <?php
                        if(isset($data['result'])){
                            if($data['result']==false){
                                echo "Tên tài khoản đã tồn tại. Đăng kí không thành công";

                            }else{
                                echo "Đăng kí thành công";
                        ?>
                            <form method="POST" action="/mvc/admin/Login_User" style="margin-top: 10px;">
                                <input type="hidden" name="Username" value="<?=$data['Username']?>">
                                <input type="hidden" name="Password" value="<?=$data['Password']?>">
                                <input type="submit" value="Log in now" name="Login" class="btn btn-warning btm-sm">
                            </form>
                        <?php    
                            }
                        }    
                        ?>
                        </h4>
                    </div>
                </div>
            </form>
        </section>
</div>