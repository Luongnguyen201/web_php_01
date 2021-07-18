
<div class="col-md-9" style=" margin-left:50px;">
    <div style="margin-top: 5px;">
        <form action="/mvc/admin/List_product" method="POST">
            <input type="search" name="Search" placeholder="Nhập từ khóa ?" class="col-md-4 btn btn-outline-info btn-sm">
            <input type="submit" value="Search" class="btn btn-info btn-sm">
        </form> 
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Thông tin chi tiết</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Nhà cung cấp</th>
            <th scope="col">Số lương nhập</th>
            <th scope="col">Giá nhập</th>
            <th scope="col">Giá xuất</th>
            <th scope="col">Khuyến mãi(%)</th>
            <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
            while($row=mysqli_fetch_array($data['Product'])):
                $i+=1;
        ?>
            <tr>
            <td><?=$row['Ten_sp']?> <br>
                <img width="150px" src="/mvc/public/image/<?=$row['Anh_sp']?>">
            </td>
            <td>
               <b>Hệ điều hành: </b><?=$row['He_dieu_hanh']?><hr>
               <b>Ứng dụng: </b><?=$row['Ung_dung']?><hr> 
               <b>Công nghệ hình ảnh: </b><?=$row['Cong_nghe_hinh_anh']?><hr>
               <b>Giọng nói: </b><?=$row['Giong_noi']?><hr>
               <b>Remote: </b><?=$row['Remote']?><hr>
               <b>Size: </b><?=$row['Size']?><hr>
               <b>Nam sẳn xuất: </b><?=$row['Nam_sx']?>
            </td>
            <td><?=$row['Mo_ta']?></td>
            <td><?=$row['Id_dm']?></td>
            <td><?=$row['So_luong']?></td>
            <td><?=$row['Gia_mua']?></td>
            <td><?=$row['Gia_ban']?></td>
            <td><?=$row['Khuyen_mai']?></td>
            <td>
                <a href="/mvc/admin/List_product&Id_sp=<?=$row['Id_sp']?>"  onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;
                <a style="margin-top:5px" href="/mvc/admin/Update_product&Id_sp=<?=$row['Id_sp']?>" class="btn btn-outline-primary btn-sm">Update</a>
            </td>
            </tr>
        <?php endwhile; ?>    
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php $cr_page=$data['Page']; echo ($cr_page-1==0)? 'disabled':'' ?>">
                <a class="page-link" href="/mvc/admin/List_product&page=<?php echo $cr_page-1 ?>" tabindex="-1">Previous</a>
            </li>
        <?php
            $total=$data['Total'];
                for ($i=1; $i<=$total ; $i++) :
        ?>
            <li class="page-item <?php echo (($cr_page==$i)? 'active':'') ?>"><a class="page-link" href="/mvc/admin/List_product&page=<?php echo $i ?>"><?php echo $i;?></a></li>
        <?php endfor; ?>
            <li class="page-item <?php echo ($cr_page==$total)? 'disabled': ''; ?>">
                <a class="page-link" href="/mvc/admin/List_product&page=<?php echo $cr_page+1 ?>">Next</a>
            </li>
        </ul>
    </nav>      
</div>
