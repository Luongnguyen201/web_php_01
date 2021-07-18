<section style="margin-left:5vw;" class="section-ql " style="width:85%;">
            <div class="text-center p-2 shd-ql"> 
                <span class="tt-ql">
                    Cập nhật khách hàng - UPDATE USER
                </span>
            </div>
            <?php while($row=mysqli_fetch_array($data["result"])): ?>
            <form action="/mvc/admin/Update_customer&Id_kh=<?=$row['Id_kh']?>" method="post" enctype="multipart/form-data">
                <div class="container">
                    <hr>
                    <span style="color: rgb(255, 0, 0);" >Thông tin chi tiết-Details </span>
                    <div class="row">
                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">
                            
                            <!-- nhà cc -->
                            <div class="form-group">
                                <label for="nhacc">Mở - Khóa tài khoản</label>
                                <select class="col-md-3 form-control" name="Status">
                                    <?php if(($row['Status'])==1){ ?>
                                        <option value="<?=1?>">Mở</option> 
                                        <option value="<?=0?>">Khóa</option> 
                                    <?php }else{?>
                                        <option value="<?=0?>">Khóa</option> 
                                        <option value="<?=1?>">Mở</option> 
                                    <?php }?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- ngày nhập -->
                                    <div class="form-group">
                                        <label for="ngaynhap">Tên tài khoản  - User name</label>
                                        <input type="text" name="Username" value="<?=$row['Username']?>" class="form-control" placeholder="Nhập tên khách hàng">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Trạng thái -->
                                    <div class="form-group">
                                        <label for="trangthai">Họ và tên - Fullname</label>
                                        <input type="text" name="Fullname" value="<?=$row['Fullname']?>" class="form-control" placeholder="Họ và tên">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nhanvien">Email</label>
                                        <input type="text" name="Email" value="<?=$row['Email']?>" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                                
                        </div>      

                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">  
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nhanvien">Số điện thoại - Number phone</label>
                                        <input type="text" name="Number_phone" value="<?=$row['Number_phone']?>" class="form-control" placeholder="Số điện thoại">  
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="">Địa chỉ - Address</label>
                                    <input type="text" name="Address" value="<?=$row['Address']?>" class="form-control" placeholder="Địa chỉ">     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5">
                        <hr>
                        <input type="submit" name="Update" class="btn btn-outline-primary" value="Ghi lại-Record">
                    </div>
                </div>
            </form>
            <?php endwhile; ?>
        </section>