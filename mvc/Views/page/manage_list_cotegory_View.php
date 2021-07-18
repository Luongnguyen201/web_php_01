<div class="col-md-9">
<table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th scope="col">Tên danh mục  - Nhà cung cấp - Cotegory</th>
            <th scope="col">Ảnh đại diện - avatar</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
            while($row=mysqli_fetch_array($data['cotegory'])):
                $i+=1;
        ?>
            <tr>
            <td><?=$i?></td>
            <td><?=$row['Ten_dm']?></td>
            <td>
                <img width="200px" src="/mvc/public/image/<?=$row['Anh_dm']?>">
            </td>
            <td>
                <a href="/mvc/admin/List_cotegory&Id_dm=<?=$row['Id_dm']?>"  onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;
                <a  href="/mvc/admin/Update_cotegory&Id_dm=<?=$row['Id_dm']?>" class="btn btn-outline-primary btn-sm">Update</a>
            </td>
            </tr>
        <?php endwhile; ?>    
        </tbody>
    </table>
</div>