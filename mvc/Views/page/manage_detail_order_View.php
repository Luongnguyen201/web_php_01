
<div class="col-md-9" style=" margin-left:50px; margin-top:30px;">
    <h5>Đơn hàng</h5>
    <div>
        <table class="table"  style="border: rgb(165, 165, 165) 1px solid;">
            <thead>
                <tr>
                <th scope="col">ID khách hàng</th>
                <th scope="col">Họ và tên - Fullname</th>
                <th scope="col">Phương thức thanh toán</th>
                <th scope="col">Giá đơn(đ)</th>
                <th scope="col">Ngày lập</th>
                <th scope="col">Tình trạng</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row=mysqli_fetch_array($data['don'])):
            ?>
                <tr>
                    <td><?=$row['Id_kh']?></td>
                    <td><?=$row['Fullname']?></td>
                    <?php foreach($data['pttt'] as $PT):
                        if($row['Id_pttt']==$PT['Id']){
                    ?>
                        <td><?=$PT['Ordername']?></td>
                    <?php } endforeach; ?>
                    <td><?php echo number_format($row['Gia_don'],0,',','.')?></td>
                    <td><?=$row['Ngay_lap']?></td>
                    <?php foreach($data['ttdh'] as $ttdh):
                            if($row['Tinh_trang']==$ttdh['Id']):
                    ?>
                        <td><?=$ttdh['Name']?></td>
                    <?php endif; endforeach;?>
                </tr>
                <tr>
                    <a href="/mvc/admin/add_detail_ord&Id_dh=<?=$row['Id']?>" class="btn btn-outline-primary btn-sm">Add</a>
                </tr>
            <?php endwhile;?>    
            </tbody>
        </table>   
    </div> 
    <?php if(mysqli_num_rows($data['ct_don'])!=0): ?>
        <div>
            <h5>Chi tiết đơn</h5>
        <table class="table"  style="border: rgb(165, 165, 165) 1px solid;">
                <thead>
                    <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá(đ)</th>
                    <th scope="col">Khuyến mãi(%)</th>
                    <th scope="col">Số lượng mua</th>
                    <th scope="col">Thành tiền(đ)</th>
                    <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row=mysqli_fetch_array($data['ct_don'])):
                ?>
                    <tr>
                        <?php
                        foreach($data['product'] as $r):
                            if($row['Id_sp']==$r['Id_sp']){
                        ?>
                            <td>
                                <?=$r['Ten_sp']?><br>
                            </td>
                        <?php } endforeach; ?>
                        <td><?php echo number_format($row['Gia_ban_sp'],0,',','.')?></td>
                        <td><?=$row['Khuyen_mai']?></td>
                        <td><?=$row['So_luong']?></td>
                        <td><?php echo number_format($row['Thanh_tien'],0,',','.')?></td>
                        <td>
                            <a href="/mvc/admin/Detail_order&Id_dh=<?=$row['Id_dh']?>&Id_ct=<?=$row['Id']?>&Id_sp=<?=$row['Id_sp']?>&So_luong=<?=$row['So_luong']?>"  onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;
                            <a href="/mvc/admin/add_detail_ord&Id_dh=<?=$row['Id_dh']?>" class="btn btn-outline-primary btn-sm">Add</a>
                        </td>  
                    </tr>
                <?php endwhile;?>    
                </tbody>
            </table>
        </div> 
    <?php endif;?>
</div>
