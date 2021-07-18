        <section style="margin-left:5vw;" class="section-ql " style="width:85%;">
            <div class="text-center p-2 shd-ql"> 
                <span class="tt-ql">
                    Sửa thông tin sản phẩm - UPDATE PRODUCT
                </span>
            </div>
            <?php $row=mysqli_fetch_array($data['result']); ?>
            <form action="/mvc/admin/Update_product&Id_sp=<?=$row['Id_sp']?>" method="post" enctype="multipart/form-data">
                <div class="container">
                    <hr>
                    <span style="color: rgb(255, 0, 0);" >Thông tin chi tiết-Details </span>
                    <div class="row">
                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">
                            <!-- nhà cc -->
                            <div class="form-group">
                                <label for="nhacc">Danh mục-Thương hiệu-Nhà cung cấp</label>
                                <?php while($row1=mysqli_fetch_array($data["cotegory"])): ?>
                                    <h3 value="<?=$row['Id_dm']?>"><?php if(($row1['Id_dm'])==($row['Id_dm'])){ echo $row1['Ten_dm']; } ?></h3> 
                                <?php endwhile; ?>    
                            </div>
                            <div style="text-align:center;" class="form-group">
                                   <img width="200px;" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt="">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- ngày nhập -->
                                    <div class="form-group">
                                        <label for="ngaynhap">Tên sản phẩm - Name product </label>
                                        <input type="text" name="Ten_sp" value="<?=$row['Ten_sp']?>" class="form-control" placeholder="Nhập tên sản phẩm">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Trạng thái -->
                                    <div class="form-group">
                                        <label for="trangthai">Giá nhập-Entry price</label>
                                        <input type="text" name="Gia_mua" value="<?=$row['Gia_mua']?>" class="form-control" placeholder="Nhập giá mua của sản phẩm">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nhanvien">Giá bán ra thị trường-Price</label>
                                        <input type="text" name="Gia_ban" value="<?=$row['Gia_ban']?>" class="form-control" placeholder="Nhập giá bán của sản phẩm">
                                    </div>
                                </div>
                            </div>
                                
                        </div>      

                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">  
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nhanvien">Số lượng nhập - Quantity</label>
                                        <input type="text" name="So_luong" value="<?=$row['So_luong']?>" class="form-control" placeholder="Nhập số lượng đầu vào của sản phẩm">  
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="">Khuyến mãi-Promotion(%)</label>
                                    <input type="number" name="Khuyen_mai" value="<?=$row['Khuyen_mai']?>" class="form-control" placeholder="Nhập phần trăm khuyến mãi của sản phẩm">     
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Hệ điều hành-Operating system</label>
                                        <input type="text" name="He_dieu_hanh" value="<?=$row['He_dieu_hanh']?>" class="form-control" placeholder="Nhập hệ điều hành của sản phẩm">  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nhanvien">Ứng dụng phổ biến-Popular apps</label>
                                        <input type="text" name="Ung_dung" value="<?=$row['Ung_dung']?>" class="form-control" placeholder="Nhập ứng dụng phổ biến của sản phẩm">                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="">Công nghệ hình ảnh-Image technology</label>
                                    <input type="text" name="Cong_nghe_hinh_anh" value="<?=$row['Cong_nghe_hinh_anh']?>" class="form-control" placeholder="Nhập công nghệ hình ảnh của sản phẩm">                                     </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Điều khiển Giọng nói-Voice Control</label>
                                        <input type="text" name="Giong_noi" value="<?=$row['Giong_noi']?>" class="form-control" placeholder="Nhập thông tin kĩ thuật điều khiển giọng nói của sản phẩm"> 
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Điều kiển-Remote</label>
                                        <input type="text" name="Remote" value="<?=$row['Remote']?>" class="form-control" placeholder="Nhập thông tin remote điều khiển vào của sản phẩm"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">  
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nhanvien">Kích thước màn hình-Screen size</label>
                                        <input type="text" name="Size" value="<?=$row['Size']?>" class="form-control" placeholder="Nhập kích thước của sản phẩm">                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="">Năm sản xuất-Year of manufacture</label>
                                    <input type="text" name="Nam_sx" value="<?=$row['Nam_sx']?>" class="form-control" placeholder="Nhập số năm sản xuất của sản phẩm">                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Mô tả-Describe</label>
                                        <input type="text" name="Mo_ta" value="<?=$row['Mo_ta']?>" class="form-control" placeholder="Nhập thông tin mô tả chi tiết về sản phẩm"></input>                                  </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Chọn ảnh đại diện sản phẩm-Choose a product avatar</label>
                                        <input type="file" name="Anh_sp" class="btn btn-secondary">
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
        </section>