
<div class="col-md-9" style=" margin-left:50px;">
    <div style="margin-top: 5px;">
        <form action="/mvc/admin/List_customer" method="POST">
            <input type="search" name="Search" placeholder="Nhập từ khóa ?" class="col-md-4 btn btn-outline-info btn-sm">
            <input type="submit" value="Search" class="btn btn-info btn-sm">
        </form> 
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th></th>
            <th scope="col">Tên tài khoản - User name</th>
            <th scope="col">Fullname - Họ và tên</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại - Number phone</th>
            <th scope="col">Địa chỉ - Address</th>
            <th scope="col">Khóa - Mở tài khoản</th>
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
            <td><?=$row['Username']?></td>
            <td><?=$row['Fullname']?></td>
            <td><?=$row['Email']?></td>
            <td><?=$row['Number_phone']?></td>
            <td><?=$row['Address']?></td>
            <td><?php if($row['Status']==1){ echo"Mở"; }else { echo "Khóa";} ?></td>
            <td>
                <a href="/mvc/admin/List_customer&Id_kh=<?=$row['Id_kh']?>"  onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;
                <a style="margin-top:5px" href="/mvc/admin/Update_customer&Id_kh=<?=$row['Id_kh']?>" class="btn btn-outline-primary btn-sm">Update</a>
            </td>
            </tr>
        <?php endwhile; ?>    
        </tbody>
    </table>
    <?php if(isset($data['Total'])>10): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php $cr_page=$data['Page']; echo ($cr_page-1==0)? 'disabled':'' ?>">
                <a class="page-link" href="/mvc/admin/List_customer&page=<?php echo $cr_page-1 ?>" tabindex="-1">Previous</a>
            </li>
        <?php
            $total=$data['Total'];
                for ($i=1; $i<=$total ; $i++) :
        ?>
            <li class="page-item <?php echo (($cr_page==$i)? 'active':'') ?>"><a class="page-link" href="/mvc/admin/List_customer&page=<?php echo $i ?>"><?php echo $i;?></a></li>
        <?php endfor; ?>
            <li class="page-item <?php echo ($cr_page==$total)? 'disabled': ''; ?>">
                <a class="page-link" href="/mvc/admin/List_customer&page=<?php echo $cr_page+1 ?>">Next</a>
            </li>
        </ul>
    </nav>  
    <?php endif; ?>    
</div>
