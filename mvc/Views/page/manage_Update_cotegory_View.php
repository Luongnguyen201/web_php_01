<div class="col-md-9" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-left:50px; margin-top:15px; margin-bottom:15px;">
    <div>
    <h5 class="text-center">Cập nhật nhà cung cấp - Update cotegory</h5>
    <?php while($row=mysqli_fetch_array($data['result'])): ?>
        <form method="POST" enctype="multipart/form-data" action="/mvc/admin/Update_cotegory&Id_dm=<?=$row['Id_dm']?>" class="form-group">
            <input style="margin-top:30px" type="text" value="<?=$row['Ten_dm']?>" class="form-control" placeholder="Tên nhà cung cấp - Danh mục" name="Ten_dm">
            <input style="margin-top:5px" type="file" name="Anh_dm" class="btn btn-outline-warning btn-sm"><br>
            <input type="hidden" name="Anh_dm1" value="<?=$row['Anh_dm']?>">
            <input style="margin-top:15px; margin-left:40%" type="submit" value="Ghi lại - Record" name="Save" class="btn btn-outline-info btn-sm">
        </form>
    <?php  endwhile; ?>    
    </div>
</div>