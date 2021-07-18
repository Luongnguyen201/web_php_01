<style>
figure.snip0016 {
  font-family: 'Raleway', Arial, sans-serif;
  color: #fff;
  position: relative;
  overflow: hidden;
  margin: 10px;
  min-width: 220px;
  max-width: 310px;
  max-height: 220px;
  width: 100%;
  background: #000000;
  text-align: left;
}
figure.snip0016 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
figure.snip0016 img {
  max-width: 100%;
  opacity: 1;
  width: 100%;
  -webkit-transition: opacity 0.35s;
  transition: opacity 0.35s;
}
figure.snip0016 figcaption {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 30px 3em;
  width: 100%;
  height: 100%;
}
figure.snip0016 figcaption::before {
  position: absolute;
  top: 30px;
  right: 30px;
  bottom: 30px;
  left: 100%;
  border-left: 4px solid rgba(255, 255, 255, 0.8);
  content: '';
  opacity: 0;
  background-color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
  -webkit-transition-delay: 0.6s;
  transition-delay: 0.6s;
}
figure.snip0016 h5,
figure.snip0016 p {
  margin: 0 0 5px;
  opacity: 0;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s,-webkit-transform 0.35s,-moz-transform 0.35s,-o-transform 0.35s,transform 0.35s;
}
/* figure.snip0016 h5 {
  word-spacing: -0.15em;
  font-weight: 300;
  text-transform: uppercase;
  -webkit-transform: translate3d(30%, 0%, 0);
  transform: translate3d(30%, 0%, 0);
  -webkit-transition-delay: 0.3s;
  transition-delay: 0.3s;
} */
/* figure.snip0016 h5 span {
  font-weight: 800;
} */
figure.snip0016 p {
  font-weight: 200;
  -webkit-transform: translate3d(0%, 30%, 0);
  transform: translate3d(0%, 30%, 0);
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
figure.snip0016 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  color: #ffffff;
}
figure.snip0016:hover img {
  opacity: 0.3;
}
figure.snip0016:hover figcaption h5 {
  opacity: 1;
  -webkit-transform: translate3d(0%, 0%, 0);
  transform: translate3d(0%, 0%, 0);
  -webkit-transition-delay: 0.4s;
  transition-delay: 0.4s;
}
</style>
<br>
<div class="container-fluid">
	<div class="row">
		<?php
			while ($row=mysqli_fetch_array($data["List_cotegory"])){
		?>
	  	<div class="col-lg-3">
	  		<div class="item">
	  			<a style="text-decoration:none;" href="/mvc/List_product/product&Id_dm=<?=$row['Id_dm']?>"><img class="card-img-top" src="/mvc/public/image/<?=$row["Anh_dm"]?>" alt=""></a>
				<a style="text-decoration:none; color:black" href="/mvc/List_product/product&Id_dm=<?=$row['Id_dm']?>"><h1 class="text-center" style="font-family: Bookman; font-size:25px; margin-top:25px"><?=$row["Ten_dm"]; ?></h1></a>
			</div>
		</div>
		<?php } ?>
		<div class="col-md-12">
			<div class="row">
				<?php
					while ($row=mysqli_fetch_array($data["List_product"])){
				?>
				<div class="item2 col-2">
					<!-- <a  href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img width="220px" style="margin-top:35px; text-decoration:none;" class="img-fluid" src="/mvc/public/image/<?=$row["Anh_sp"]?>" alt=""></a> -->
					<figure class="snip0016">
						<img src="/mvc/public/image/<?=$row["Anh_sp"]?>"/>
						<figcaption>
							<h5><span><a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a></span>
							<span><br><?php if ($row['Khuyen_mai']>=1){ echo "<del>". number_format($row['Gia_ban'],0,',','.')."</del>";}else{ echo "";} ?></span></h5>
							<a href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"></a>
						</figcaption>     
					</figure>
				</div>	
				<?php }?>
			</div><br>
			<?php 
				if((mysqli_num_rows($data['List_product'])>1)){
			?>
			<div style="background-color: white;">
			<br>
				<nav aria-label="Page navigation example">
				  	<ul class="pagination justify-content-center">
				    	<li class="page-item <?php $cr_page=$data['Page']; echo ($cr_page-1==0)? 'disabled':'' ?>">
				      		<a  class="page-link" href="/mvc/Home&page=<?php echo $cr_page-1 ?>" tabindex="-1">Previous</a>
				    	</li>
						<?php
						$total=$data['Total'];
							for ($i=1; $i<=$total ; $i++) :
						?>
				    	<li class="page-item <?php echo (($cr_page==$i)? 'active':'') ?>"><a class="page-link" href="/mvc/Home&page=<?php echo $i ?>"><?php echo $i;?></a></li>
						<?php endfor; ?>
				    	<li class="page-item <?php echo ($cr_page==$total)? 'disabled': ''; ?>">
				      		<a class="page-link" href="/mvc/Home&page=<?php echo $cr_page+1 ?>">Next</a>
				   		</li>
				  	</ul>
				</nav>
				<hr>
			</div>
			<?php 
				}elseif(mysqli_num_rows($data['List_product'])==0){
			?>			
			<div class="text-center">
				<h5>No products</h5>
			</div>
			<?php
				}
			?>
		</div>
		<div class="col-md-12 container-fluid" style="background-color: white;"><br>
			<h5>Promotional products</h5>
		<hr>
			<div class="row">
				<?php
					for ($i=1; $i <=16 ; $i++) { 
						$row=mysqli_fetch_array($data['ad_product'])
				?>
				<div class="col">
					<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img class="img-fluid" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt=""></a>
					<div class="col">
						<a style="text-decoration:none;" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?=$row['Ten_sp']?></a>
						<a style="text-decoration:none;" class="text" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>">
							<span><a style="text-decoration:none;" style="color:red" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a>đ</span>
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
</div>