<div class="col-md-9" style=" margin-left:50px;">
<br>
<h5 class="text-center">THÔNG SỐ KHO</h5>
    <div style="margin-top: 5px;">
        <form action="/mvc/admin/Inventory" method="POST">
            <input type="search" name="Search" placeholder="Nhập từ khóa ?" class="col-md-4 btn btn-outline-info btn-sm">
            <input type="submit" value="Search" class="btn btn-info btn-sm">
        </form> 
    </div>
    <div>
        <table class="table"  style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px;">
            <thead>
                <tr>
                <th scope="col">Tổng giá trị nhập(đ)</th></th>
                <th scope="col">Tổng giá trị xuất(đ)</th>
                <th scope="col">Tổng giá trị doanh thu(đ)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo number_format($data['T_nhap'],0,',','.');?> đ</td>
                    <td><?php echo number_format($data['T_xuat'],0,',','.');?> đ</td>
                    <td><?php echo number_format($data['T_loi'],0,',','.'); ?> đ</td>
                </tr>   
            </tbody>
        </table>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th></th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá nhập</th>
                <th scope="col">Khuyến mãi(%)</th>
                <th scope="col">Giá xuất</th>
                <th scope="col">Số lượng nhập(đ)</th>
                <th scope="col">Số lượng xuất(đ)</th>
                <th scope="col">Số lượng Tồn</th>
                <th scope="col">Tổng vốn tồn kho theo sp(đ)</th>
                <th scope="col">Tổng giá trị tồn kho theo sp(đ)</th>
                <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i=0;
                $Ton=0;
                foreach(($data['result']) as $row):          
                    $i+=1;     
            ?>
                <tr>
                <td><?=$row['Id_sp']?></td>
                <td> 
                    <a style="color:black" href="/mvc/admin/Update_product&Id_sp=<?=$row['Id_sp']?>">
                    <label for=""><?=$row['Ten_sp']?>(click)</label><br>
                    <img width="150px" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt=""></a>
                </td>
                <td><?php echo number_format($row['Gia_mua'],0,',','.');?></td>
                <td><?=$row['Khuyen_mai']?>%</td>
                <td><?php echo number_format($Gia_xuat=($row['Gia_ban']*(100-$row['Khuyen_mai'])/100),0,',','.');?></td>
                <td><?=$row['So_luong']?></td>
                <?php 
                    foreach($data['sl_ban'] as $r):
                        if(($r['Id_sp'])==($row['Id_sp'])) :
                ?>
                    <td><?=$r['So_luong_ban'];?></td>
                <?php endif; endforeach; ?>    
                <?php 
                    foreach($data['sl_ton'] as $r):
                        if(($r['Id_sp'])==($row['Id_sp'])) :
                ?>
                    <td><?=$Ton=$row['So_luong']-$r['So_luong_ban'];?></td>
                <?php endif; endforeach; ?> 
                <td><?php echo number_format($Tong_gia_nhap=($Ton*$row['Gia_mua']),0,',','.');?></td>
                <td><?php echo number_format($Tong_gia_xuat=($Ton*$Gia_xuat),0,',','.'); ?></td>
                <td><?php if($Ton==0){ echo"<b style='color:red'>Hết hàng<b>"; }else{ echo "<b>Còn hàng<b>"; } ?></td>
                </tr>
            <?php  endforeach; ?>    
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php $cr_page=$data['Page']; echo ($cr_page-1==0)? 'disabled':'' ?>">
                <a class="page-link" href="/mvc/admin/Inventory&page=<?php echo $cr_page-1 ?>" tabindex="-1">Previous</a>
            </li>
            <?php
            $total=$data['Total'];
                for ($i=1; $i<=$total ; $i++) :
        ?>
            <li class="page-item <?php echo (($cr_page==$i)? 'active':'') ?>"><a class="page-link" href="/mvc/admin/Inventory&page=<?php echo $i ?>"><?php echo $i;?></a></li>
        <?php endfor; ?>
            <li class="page-item <?php echo ($cr_page==$total)? 'disabled': ''; ?>">
                <a class="page-link" href="/mvc/admin/Inventory&page=<?php echo $cr_page+1 ?>">Next</a>
            </li>
        </ul>
    </nav>   
    <hr><br><br>
</div>
