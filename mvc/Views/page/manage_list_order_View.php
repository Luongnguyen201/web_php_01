
<div class="col-md-9" style=" margin-left:50px;">
    <div style="margin-top: 5px;" class="r">
        <form action="/mvc/admin/List_Order" method="POST">
            <input type="search" name="Search" placeholder="Nhập từ khóa ?" class="col-md-4 btn btn-outline-info btn-sm">
            <input type="submit" value="Search" class="btn btn-info btn-sm">
        </form> 
    </div>
    <div class="row">
        <div>
            <a type="submit" href="/mvc/admin/Add_Order" style="color:aliceblue;" class="btn btn-secondary">Add</a>
        </div>
        <div style="margin-left: 20px;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tình trạng
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php foreach($data['tt_1'] as $row): ?>
                    <a class="dropdown-item" href="/mvc/admin/List_Order&Id_tinh_trang=<?=$row['Id']?>"><?=$row['Name']?></a>
                    <?php endforeach; ?>
                    <a class="dropdown-item" href="/mvc/admin/List_Order">ALL</a>
                </div>
            </div>
        </div>
    </div>
    <?php if(mysqli_num_rows($data['result'])!=0){ ?>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th></th>
            <th scope="col">ID khách hàng</th>
            <th scope="col">Họ và tên - Fullname</th>
            <th scope="col">Phương thức thanh toán</th>
            <th scope="col">Giá đơn</th>
            <th scope="col">Ngày lập</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Chức năng - Function</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
            while($row=mysqli_fetch_array($data['result'])):
                $i+=1;
        ?>
            <tr>
            <td><?=$i?></td>
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
                <td> 
                    <div class="row">
                        <?=$ttdh['Name']?>
                        <?php endif; endforeach;?>
                        <div class="dropdown">
                            <button class="btn btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b style="font-size: 15px;"></b> 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php foreach($data['tt'] as $r): ?>
                                <a class="dropdown-item" href="/mvc/admin/List_Order&Id_tt=<?=$r['Id']?>&Id_hd=<?=$row['Id']?>"><?=$r['Name']?></a>
                                <?php endforeach; ?>
                            </div>
                        </div> 
                    </div>   
                </td>
            <td>
                <a href="/mvc/admin/List_Order&Id_dh=<?=$row['Id']?>"  onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;
                <a href="/mvc/admin/Detail_order&Id_dh=<?=$row['Id']?>" class="btn btn-outline-primary btn-sm">Details Order</a>
            </td>
            </tr>
        <?php endwhile;?>    
        </tbody>
    </table>
    <?php if($data['Total']>1): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php $cr_page=$data['Page']; echo ($cr_page-1==0)? 'disabled':'' ?>">
                <a class="page-link" href="/mvc/admin/List_Order&page=<?php echo $cr_page-1 ?>" tabindex="-1">Previous</a>
            </li>
        <?php
            $total=$data['Total'];
                for ($i=1; $i<=$total ; $i++) :
        ?>
            <li class="page-item <?php echo (($cr_page==$i)? 'active':'') ?>"><a class="page-link" href="/mvc/admin/List_Order&page=<?php echo $i ?>"><?php echo $i;?></a></li>
        <?php endfor; ?>
            <li class="page-item <?php echo ($cr_page==$total)? 'disabled': ''; ?>">
                <a class="page-link" href="/mvc/admin/List_Order&page=<?php echo $cr_page+1 ?>">Next</a>
            </li>
        </ul>
    </nav> 
    <?php endif; ?>   
    <?php }else{ ?>
    <h5 class="text-center"><?php echo"Không có đơn hàng";?></h5>     
    <?php }?>  
</div>
