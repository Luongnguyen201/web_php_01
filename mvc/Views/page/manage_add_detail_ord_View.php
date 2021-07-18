<div class="col-md-9">
    <form action="/mvc/admin/add_detail_ord&Id_dh=<?=$data['Id_dh']?>" method="POST">
    <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">  
    <span style="color: rgb(255, 0, 0);" >Chi tiết đơn</span>
        <div class="form-group">
            <label for="nhacc">Sản phẩm</label>
                <select class="form-control" name="Id_sp" >
                    <?php while($Sp=mysqli_fetch_array($data['product'])): ?>
                        <option value="<?=$Sp['Id_sp']?>"><?=$Sp['Id_sp']?>--<?=$Sp['Ten_sp']?> Giá: <?=$Sp['Gia_ban']?></option>
                    <?php endwhile; ?>
                </select>
                </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="sl">Số lượng: </label>
                                    <input type="number"
                        class="form-control" name="So_luong" min="1" max="99" aria-describedby="helpId" value="<?=1?>">
                        <input style="margin-top: 30px;" type="submit" value="Lưu lại" name="add_detail" class="btn btn-outline-warning btn-sm" >
                    </div>
                </div>
            </div>           
        </div>
    </form>
</div>