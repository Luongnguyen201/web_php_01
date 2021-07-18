<div style="background-color: white;" class="container-fluid">
	<hr>
	<div class="row">
		<div class="col-md-1">
			<div>
				<a href=""><img  class="img-fluid" src="/mvc/public/image/ngang.jpg" alt=""></a>
				</div>
			<div>
				<a href=""><img style="margin-left: 35px;" width="30px" height="100px" class="img-fluid" src="/mvc/public/image/doc.jpg" alt=""></a>
			</div>
			<div>
				<a href=""><img class="img-fluid" src="/mvc/public/image/360.jpg" alt=""></a>
			</div>
			<div>
				<a href=""><img class="img-fluid" src="/mvc/public/image/dchao.jpg" alt=""></a>
			</div>
			<div>
				<a href=""><img style="margin-left: 35px;" width="30px" class="img-fluid" src="/mvc/public/image/remote.jpg" alt=""></a>
			</div>
		</div>
		<div class="col-md-4">
		<?php while($row=mysqli_fetch_array($data['result'])){ ?>
			<img class="img-fluid" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt="">
			<div class="text-center">
				<label for="">Roll over image to zoom in</label>
			</div>
		</div>
		<div class="col-md-5">
			<h3><?=$row['Ten_sp']?></h3>
			<a style="text-decoration:none;" href="">Visit the Hisense Store</a><br>
			<label>List Price: <span><a style="text-decoration:none; color:red" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a>đ</span>
                        <span><?php if ($row['Khuyen_mai']>=1){ echo "<del>". number_format($row['Gia_ban'],0,',','.')."đ</del>"."-".$row['Khuyen_mai']."%";}else{ echo "";} ?></span><a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>">Details</a></label><br>
			<label>Price: $238.00 + $392.21 Shipping & Import Fees Deposit <a style="text-decoration:none;" href="">to Vietnam Details</a></label>
			<label>You Save:<a style="text-decoration:none;" href="">Giá bán có khuyến mãi</a></label><br>
			<label>Style:<b> TV Only</b></label>
			<div>
				<label for="">Size: <?=$row['Size']?></label>
			</div>
			<label for=""><b>Operating system</b> <?=$row['He_dieu_hanh']?></label><br>
			<label for=""><b>Application</b> <?=$row['Ung_dung']?></label><br>
			<label for=""><b>Image technology</b> <?=$row['Cong_nghe_hinh_anh']?></label><br>
			<label for=""><b>Voice</b> <?=$row['Giong_noi']?></label><br>
			<label for=""><b>Remote</b> <?=$row['Remote']?></label><br>
			<label for=""><b>Year of manufacture</b> <?=$row['Nam_sx']?></label><br>
			<div style="font-size: 15px;">
				<label for=""><?=$row['Mo_ta']?></label><br>	
			</div>
		</div>
		<div class="col-md-2">
			<table class="">
				<a style="text-decoration:none;"class="text" href="">$238.00 + $392.21 Shipping & Import Fees Deposit to Vietnam Details </a><br>
				<form action="/mvc/Cart/add_Cart&action=add&Id_sp=<?=$row['Id_sp']?>" method="post"> 
					<label for=""><b>Quantity</b></label>
					<input style="margin-bottom:10px; ;" type="number" name="Quantity" class="form-control col-md-12" min="1" max="99" value="1">
					<input style="margin-top:5px; " type="submit" value="Buy Now" class="col-md-12 btn btn-success btn-sm">
				</form>
				<a style="text-decoration:none;" class="text" href="">Ships from: Amazon.comAmazon.com</a><br>
				<a style="text-decoration:none;" class="text" href="">Ships fromShips: from	Amazon.comAmazon.com
				Sold bySold by	Amazon.comAmazon.com</a>
				<a style="text-decoration:none;" href="/mvc/Cart/add_Cart&action=add&Id_sp=<?=$row['Id_sp']?>"><input type="submit" value="Add to list Cart" class="col-md-12 btn btn-secondary"></a>
			</table>
		</div>	
	</div>
	<hr>
	<style>
	div.stars {
		display: flex;
		justify-content: flex-start;
		align-items: center;
	}
	input.star { display: none; }
	label.star {
		float: right;
		padding: 1px;
		font-size: 30px;
		color: #FF9900;
		transition: all .2s;
	}
	input.star:checked ~ label.star:before {
		content: '\f005';
		color: #FD4;
		transition: all .25s;
	}
	input.star-5:checked ~ label.star:before {
		color: #FE7;
		text-shadow: 0 0 20px #952;
	}
	input.star-1:checked ~ label.star:before { color: #F62; }					 
	label.star:hover { transform: rotate(-5deg) scale(1.3); }								 
		label.star:before {
			content: '\f006';
			font-family: FontAwesome;
		}
	</style>
		<div>
			<div class="stars">
			<h4>Product Reviews </h4>&nbsp
				<form action="" style="margin-top: 20px;">
					<input class="star star-5" id="star-5" type="radio" name="star"/>
					<label class="star star-5" for="star-5" data-value="5"></label>
					<input class="star star-4" id="star-4" type="radio" name="star"/>
					<label class="star star-4" for="star-4" data-value="4"> </label>
					<input class="star star-3" id="star-3" type="radio" name="star"/>
					<label class="star star-3" for="star-3" data-value="3"></label>
					<input class="star star-2" id="star-2" type="radio" name="star"/>
					<label class="star star-2" for="star-2" data-value="2"></label>
					<input class="star star-1" id="star-1" type="radio" name="star"/>
					<label class="star star-1" for="star-1" data-value="1"></label>
					</form>&nbsp
			</div>
	</div>	
	<div class="container-fluid row">
		<div class="col-md-4">
			<form method="POST" enctype="multipart/form-data" action="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>">
				<div class="row">
					<input type="text" class="form-control col-md-6" name="Binh_luan" placeholder="Have a question?" autocomplete="off" maxlength="250">
					<input type="file" name="Anh_bl" class="btn btn-secondary btn-sm col-md-2"style="margin-left: 5px;">
					<input type="submit" class="btn btn-success" style="margin-left: 5px;">	
				</div>	
			</form>
			<?php
				if(mysqli_num_rows($data['Get_bl'])>0):
				foreach($data['Get_bl'] as $row){
					$anh=$row['Anh_bl'];
			?>
			<div style="border: rgb(165, 165, 165); border-radius: 10px; background-color:#bdbdbd; " class="col-md-12">
				<div >
					<h5><?=$row['Username']?></h5>
					<p><?=$row['Binh_luan']?></p>
					<?php
						if(($anh)!=0 and $anh!=null){
					?>
						<img class="img-fluid" width="150px" src="<?php echo "/mvc/public/image/$anh" ?>">
					<?php } ?>
					<p class="text-right"><?=$row['Ngay']?></p>
				</div>
			</div>
			<?php } ?>
			<?php else: ?>
				<div class=" text-center col-md-12">
					<svg style=" margin-top: 150px;" xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-journal-richtext" viewBox="0 0 16 16">
					<path d="M7.5 3.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047L11 4.75V7a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 7v-.5s1.54-1.274 1.639-1.208zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
					<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
					<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
					<h6 style="margin-top: 20px;">Không có bình luận</h6>
				</div>	
			<?php endif; ?>
			<br>	
			<?php 
				if((mysqli_num_rows($data['Get_bl'])>=1)){
			?>
			<div style="margin-left: 25%;" class="col-md-6">
				<nav aria-label="Page navigation example">
				  	<ul class="pagination justify-content-center">
				    	<li class="page-item <?php $cr_page=$data['Page']; echo ($cr_page-1==0)? 'disabled':'' ?>">
				      		<a class="page-link" href="/mvc/detail_product/Detail&Id_sp=<?=$data['Id_sp']?>&page=<?php echo $cr_page-1 ?>" tabindex="-1">Previous</a>
				    	</li>
						<?php
						$total=$data['Total'];
							for ($i=1; $i<=$total ; $i++) :
						?>
				    	<li class="page-item <?php echo (($cr_page==$i)? 'active':'') ?>"><a class="page-link" href="/mvc/detail_product/Detail&Id_sp=<?=$data['Id_sp']?>&page=<?php echo $i ?>"><?php echo $i;?></a></li>
						<?php endfor; ?>
				    	<li class="page-item <?php echo ($cr_page==$total)? 'disabled': ''; ?>">
				      		<a class="page-link" href="/mvc/detail_product/Detail&Id_sp=<?=$data['Id_sp']?>&page=<?php echo $cr_page+1 ?>">Next</a>
				   		</li>
				  	</ul>
				</nav>
			</div>
			<?php 
				}	
			?>
		</div>
		<div class="col-md-8">
		<div class="row">
			<?php
				for ($i=1; $i <=12 ; $i++) { 
					$row=mysqli_fetch_array($data['ad_product'])
			?>
				<div class="col-md-2">
					<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img class="img-fluid" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt=""></a>
					<div class="col">
						<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?=$row['Ten_sp']?></a>
						<a style="text-decoration:none;" class="text" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>">
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
	</div>
	<?php } ?>	
	<hr>
	<div class="col-md-12">
		<div class="row">
		<?php
				for ($i=1; $i <=16 ; $i++) { 
					$row=mysqli_fetch_array($data['ad_product1'])
			?>
				<div class="col">
					<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img class="img-fluid" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt=""></a>
					<div class="col">
						<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?=$row['Ten_sp']?></a>
						<a style="text-decoration:none;" class="text" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>">
							<span><a style="text-decoration:none; color:red" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a>đ</span>
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
</div>