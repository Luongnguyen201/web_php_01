<div class="col-md-9">
    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th scope="col">Tài khoản </th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Chức vụ</th>
            <th scope="col">Mở/khóa</th>
            <th scope="col">Xử lý</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
            while($row=mysqli_fetch_array($data['get_User_Nd'])):
                $i+=1;
        ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row['Username']?></td>
                <td><?=$row['Fullname']?></td>
                <td><?=$row['Number_phone']?></td>
                <?php 
                    foreach($data['get_staff'] as $r):  
                        if($row['Chuc_vu']==$r['Id']):    
                ?>
                    <td><?=$r['Name']?></td>
                <?php endif; endforeach; ?>    
                <td>
                    <div class="row">
                        <div>
                            <?php if($row['Status']==1){ echo "Mở"; }else{ echo "Khóa"; } ?>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b style="font-size: 15px;"></b> 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/mvc/admin/List_Staff&Id_mk=<?=1?>&Id=<?=$row['Id']?>">Mở</a>
                                <a class="dropdown-item" href="/mvc/admin/List_Staff&Id_mk=<?=0?>&Id=<?=$row['Id']?>">Khóa</a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="/mvc/admin/List_staff&Id_nd=<?=$row['Id']?>" class="btn btn-danger btn-sm">Xóa </a>
                </td>
            </tr>
        <?php endwhile; ?>    
        </tbody>
    </table>
</div>