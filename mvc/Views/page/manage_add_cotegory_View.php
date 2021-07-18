<div class="col-md-9">
<form method="post" enctype="multipart/form-data" class="container">
<h3>Thêm mới danh mục - ADD COTEGORY</h3>
    <div class="form-group row">
        <label for="Ten_dm" class="col-md-2 col-form-label">Tên Danh Mục - Name</label>
        <div class="col-md-10">
            <input type="text" name="Ten_dm" class="form-control" placeholder="Nhập tên danh mục">
            <span></span>
        </div>
    </div>
    
    <div class="form-group row">	
			<label for="Anh_dm" class="col-md-2 col-sm-10">Ảnh danh mục - Catalog photo</label>
				<div style="margin-left:15px; ">
					<td>
						<input type="file" name="Anh_dm" class="btn btn-secondary">
					</td>
				</div>
			</div>
    <div class="form-group row">
        <label for=""></label>
        <div class="col-md-10">
            <td>
                <input type="submit" name="Btsave" class="btn btn-primary" value="Ghi lại - Record">
            </td>
        </div>
    </div>
</form>   
<h5 style=text-align:center; >
    <?php
        if(isset($data['result'])){
            if($data['result']==TRUE){
                echo "Thêm danh mục thành công - Add successful category";
            }else{
                echo "Điền vào chỗ trống - Fill in the blank";
            }
        }
    ?>
</h5>
</div>
