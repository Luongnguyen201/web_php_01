<section style="margin-left:5vw;" class="section-ql " style="width:85%;">
            <div class="text-center p-2 shd-ql"> 
                <span class="tt-ql">
                   Thêm đơn và chi tiêt đơn hàng - ADD ORDER
                </span> 
            </div>
            <form action="/mvc/admin/Add_order" method="POST">
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">
                            <span style="color: rgb(255, 0, 0);" >Đơn hàng</span>
                            
                            <!-- nhà cc -->
                            <div class="form-group">
                                <label for="nhacc">ID khách hàng</label>
                                <select class="form-control" name="Id_kh">
                                <?php while($User=mysqli_fetch_array($data['tb_kh'])): ?>
                                    <option value="<?=$User['Id_kh']?>"><?=$User['Username']?> - <?=$User['Fullname']?></option>
                                    <input type="hidden" name="Fullname" value="<?=$User['Fullname']?>">
                                <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nhacc">Phương thức thanh toán</label>
                                <select class="form-control" name="pttt" >
                                <?php while($Pt=mysqli_fetch_array($data['Pttt'])): ?>
                                    <option value="<?=$Pt['Id']?>"><?=$Pt['Ordername']?></option>
                                <?php endwhile; ?>
                                </select>
                            </div>
                        
                            <div class="row">
                                <div class="col">
                                    <!-- ngày nhập -->
                                    <div class="form-group">
                                        <label for="Ngay_lap">Ngày Lập:</label>
                                        <input type="text"class="form-control" value="<?=date('Y/m/d')?>" name="Ngay_lap" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Trạng thái -->
                                    <div class="form-group">
                                        <label for="Tinh_trang">Trạng thái: </label>
                                        <select class="form-control" name="Tinh_trang">
                                        <?php while($Tt_dh=mysqli_fetch_array($data['tt_dh'])): ?>
                                            <option value="<?=$Tt_dh['Id']?>"><?=$Tt_dh['Name']?></option>
                                        <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>                       
                        </div>      

                        <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">  
                            <span style="color: rgb(255, 0, 0);" >Chi tiết đơn</span>
                            <div class="form-group">
                                <label for="nhacc">Sản phẩm</label>
                                <select class="form-control" name="Id_sp" >
                                <?php while($Sp=mysqli_fetch_array($data['product'])): ?>
                                    <option value="<?=$Sp['Id_sp']?>"><?=$Sp['Ten_sp']?> Giá: <?=$Sp['Gia_ban']?></option>
                                <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <label for="sl">Số lượng: </label>
                                    <input type="number"
                                        class="form-control" name="So_luong" min="1" max="99" aria-describedby="helpId" value="<?=1?>">
                                    </div>
                                </div>
                            </div>           
                        </div>
                        
                    </div>
                    <div class="pb-5">
                        <hr>
                        <input type="submit" name="add_order" value="Add"  class="btn btn-outline-success" role="button">
                    </div>
                </div>
            </form>
        </section>