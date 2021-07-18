<style>
.giohang-item{
    background-color: rgb(247, 247, 247);
    border-radius: 5px;
    box-shadow: 5px 5px 5px 1px rgb(209, 209, 209);
    
}
.close{
    width: 30px;
    height: 30px; 
    text-align: center;
    vertical-align: middle;
    display: table-cell ; 
    background-color: rgb(238, 234, 234);
}
.hr2{
    width: 0.5px; 
    height: auto; 
    background-color: gainsboro;
}
.form-sl{
    border-radius: 3px; 
    border: 1px gainsboro solid; 
    width: 120px;
    display: flex; 
    text-align: center;
}
.form-item{
    width: 40px; 
    height: 40px;
}
.tongtien{
    width: 100%;
    background-color: #EEEEEE;
}
</style>
<?php
$tong=0;
    if(isset($_SESSION['Cart']) && $_SESSION['Cart']!=null):
?>
    <div class="container-fluid">
        <div class="section">  
                <div class="pt-4">
                    <div style="display: flex;">
                        <div style="font-size: 1vw; width: 30%;" >
                        <a style="text-decoration:none;" href="/mvc/Controllers/Home.php"> ‹ buy more products</a>  
                        </div>
                        <div style="font-size: 1vw; width: 70%; text-align: right;" >
                            <h4> Your cart</h4>  
                        </div>
                    </div>
                    <hr class="mt-0">      
                </div>
            <?php
                $tong=0;
                if(mysqli_num_rows($data['product'])>0):
                    foreach($data['product'] as $row):
                        $tong=$tong+($row['Gia_ban']*(100-$row['Khuyen_mai'])/100)*($_SESSION['Cart'][$row['Id_sp']]);
            ?>
            <form action="/mvc/Cart/add_Cart&action=update" method="post"> 
                <div class="mt-4 giohang-item">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img class="p-4" style="width: 100%;" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt="" ></a>
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col col-sm-11" >
                                    <h5 class="mt-3"><a style="text-decoration:none;" class="text-dark" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?=$row['Ten_sp']?></a></h5>
                                    <span><a style="text-decoration:none;color:red" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a>đ</span>
                                    <span><?php if ($row['Khuyen_mai']>=1){ echo "<del>". number_format($row['Gia_ban'],0,',','.')."đ</del>"."-".$row['Khuyen_mai']."%";}else{ echo "";} ?></span>
                                </div>
                                <a href="/mvc/Cart/add_Cart&action=delete&Id_sp=<?=$row['Id_sp']?>" class="col col-sm-1 " onclick="return onClick();">
                                    <div class="close">
                                        X
                                    </div>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col col-sm-9">
                                    <b>Size:</b> <?=$row['Size']?>
                                    <br>
                                    <b>operating system:</b> <?=$row['He_dieu_hanh']?>
                                    <br>
                                    <b>Application:</b> <?=$row['Ung_dung']?>
                                    <br>
                                    <b>Artistic images:</b> <?=$row['Cong_nghe_hinh_anh']?>
                                    <br>
                                    <b>voice:</b> <?=$row['Giong_noi']?>
                                    <br>
                                    <b>Remote:</b> <?=$row['Remote']?>
                                    <br>
                                    <b>year of manufacture:</b> <?=$row['Nam_sx']?>
                                </div>
                                <div  class="col col-sm-3">
                                    <div class="col-md-6">
                                        <input type="number" name="<?=$row['Id_sp']?>" value="<?=$_SESSION['Cart'][$row['Id_sp']]?>" max="99" min="1" class="form-control btn-sm">
                                    </div>
                                    <div style="margin-left: 15px;">
                                        <span style="font-size: 15px;">into money: </span>
                                        
                                        <br><span style="color: red;"><?php echo number_format(($row['Gia_ban']*(100-$row['Khuyen_mai'])/100)*($_SESSION['Cart'][$row['Id_sp']]),0,',','.')?> đ</span>
                                        <br>
                                        <a href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><button style="margin-bottom:50px;" type="button" class="btn btn-outline-info pl-3 pr-3 p-1 mt-3" data-toggle="button" aria-pressed="false" autocomplete="off">Buy more</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
                <?php
                    endforeach;
                    endif; 
                ?>
                <div class="tongtien mt-5 ">
                    <div class="col-sm-12 row">
                        <div>
                            <input type="submit" class="btn btn-outline-info" value="Update to Cart">
                        </div>        
                        <div style="margin-left:10px;">
                            <a onclick="return confirm('Want to remove a product from the cart?')" href="/mvc/Cart/add_Cart&action=deleteAll"><button type="button" class="btn btn-outline-danger">Delete Cart All</button></a>
                        </div>
                        <div style="margin-left:10px;"> 
                            <a href="/mvc/Cart/add_Cart&action=order" name="login" class="btn btn-outline-primary">Buy <?php echo number_format($tong,0,',','.')?>đ</a>
                        </div>    
                    </div>                    
                </div>
            </form><hr>
        </div>
    </div>
    <?php
    if((isset($_SESSION['User'])) && (isset($_SESSION['Cart'])) && (isset($_SESSION['Cart'])!=null)){ 
?>
<?php
    while($User=mysqli_fetch_array($data['User'])){
?>
<section class="container-fluid order">
    <div class="row">
        <section class="col-md-8">
            <h4>Customer details</h4>
            <form method="post" action="/mvc/Cart/add_Cart&action=Update_User">
                <section class="form-group">
                    <label>First and last name</label>
                    <input type="text" name="Fullname" class="form-control" value="<?=$User['Fullname']?>" required>
                </section>
                <section class="form-group">
                    <label>Email</label>
                    <input type="email" name="Email" class="form-control" pattern=".+@.+(\.[a-z]{2,3}{1,2})" value="<?=$User['Email']?>" required>
                </section>
                <section class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="Phone_number" class="form-control" value="<?=$User['Number_phone']?>" required>
                </section>
                <section class="form-group">
                    <label>Delivery address</label>
                    <textarea class="form-control" required name="Address"><?=$User['Address']?></textarea>
                </section>
                <section class="form-group">
                    <input type="submit" value="Update" name="Update_User" class="btn btn-info btn-sm">
                </section>
            </form>
        </section>	
        <section class="col-md-4">
            <h4>Payment methods</h4>
            <form method="post" action="/mvc/Cart/add_Cart&action=Order_product">
                <?php foreach($data['Method'] as $orderMethod) : ?>
                    <section class="form-group">
                        <input type="radio" name="OrderMethodId" value="<?=$orderMethod['Id']?>" <?=$orderMethod['Id']!=1?:'checked'?>> <?=$orderMethod['Ordername']?>
                    </section>
                <?php endforeach; ?>
                <hr>
                <section>
                    <h5>Total order price: <?php echo number_format($tong,0,',','.') ?>đ</h5>
                    <input type="hidden" name="Gia_don" value="<?=$tong?>">
                </section>
                <hr>
                <div class="form-group">
                    <div class="form-check text-left">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">
                    Agree to the terms and conditions
                    </label>
                    </div>
                </div>
                <section>
                    <input type="hidden" name="Id_kh" value="<?=$User['Id_kh']?>">
                    <input type="hidden" name="Fullname" value="<?=$User['Fullname']?>">
                    <input type="hidden" name="Status" value="<?=1?>">
                </section>
                <section class="form-group">
                    <input type="submit" value="Order Now" name="Buy" class="col-md-12 btn btn-warning" style="margin-top:20px ">
                </section>
            </form>
        </section>
    </div>   
</section>	
<hr><br>
<?php  }}?>
<?php
    else:
?>
<hr>
<div class="text-center">
    <a  href="/mvc/login/History"><button class="btn btn-outline-info">Cart is empty, click to view previous orders</button></a>
</div>
<hr>
<?php
    endif;
?>
<div class="col-md-12 container-fluid">
	<div class="row">
        <?php
            for ($i=1; $i <=16 ; $i++) { 
                $row=mysqli_fetch_array($data['ad_product'])
        ?>
		<div class="col">
			<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img  class="img-fluid" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt=""></a>
			<div class="col">
				<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?=$row['Ten_sp']?></a>
				<a style="text-decoration:none;" class="text"  href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>">
                    <span><a style="text-decoration:none;color:red" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a>đ</span>
                    <span><?php if ($row['Khuyen_mai']>=1){ echo "<del>". number_format($row['Gia_ban'],0,',','.')."đ</del>"."-".$row['Khuyen_mai']."%";}else{ echo "";} ?></span>
                </a>
			</div>
            <br>
		</div>
    <?php 
        }
    ?>
	</div>
</div>