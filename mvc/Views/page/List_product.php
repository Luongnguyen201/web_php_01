<style>
	.search{
		color: black;
	}
	a.search:hover{	
		text-decoration:none;
		color: #F62;
	}
	a.search{
		font-size:18px;
	}
</style>
<?php $Id_dm=$data['Id_dm']; ?>
<div class="container-fluid" style="background-color: white;">
	<div class="row">
		<div class="col-md-3">
			<hr>
			<div class="">
				<div style="font-size: 15px; color: black; text-align: left;">
				<div>
						<h4>AVG. CUSTOMER REVIEWS</h4>
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
							  font-size: 15px;
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
							  	<form action="">
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
							  	<h6>& Up</h6>
							</div>
						</div>		
					</div>
					<div>
						<h6>PRICE</h6>
						<?php
							
							while($row=mysqli_fetch_array($data['List_price'])){
						?>
						<div><a class="search text" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Price=<?=$row['Price']?>"><?=$row['Price']?></a></div><br>
						<?php } ?>
					</div>
					<div>
						<h5>YEAR OF MANUFACTURE</h5>
						<div class="col-md-4 row">
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2021" ?>">Year 2021</a><hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2020" ?>">Year 2020</a><hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2019" ?>">Year 2019</a><hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2018" ?>">Year 2018</a><hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2017" ?>">Year 2017</a><hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2016" ?>">Year 2016</a><hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2015" ?>">Year 2015</a><hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Year=<?php echo "2014" ?>">Year 2014</a><hr>
						</div>			
					</div>
					<br>
					<h5>SCREEN SIZE</h5>
					<div class="col-md-12 row">		
						<div class="col-md-6 row">
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Size=<?php echo trim("0 inch-32 inch") ?>" >
								32 Inches & Under
							</a>
							<hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Size=<?php echo trim("33 inch-43 inch") ?>" >
								33 to 43 Inches
							</a>
							<hr>
							<a class="search"  href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Size=<?php echo trim("44 inch-49 inch") ?>" >
								44 to 49 Inches
							</a>
							<hr>
							<a class="search"  href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Size=<?php echo trim("50 inch-59 inch") ?>" >
								50 to 59 Inches
							</a>
							<hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Size=<?php echo trim("60 inch-69 inch") ?>" >
								60 to 69 Inches
							</a>
							<hr>
							<a class="search" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&Size=<?php echo trim("70 inch") ?>" >
								70 Inches & Up
							</a>
						</div>
					</div><br>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<hr>
			<div class="row">
        		<?php 
					while($row=mysqli_fetch_array($data['result'])){
				?>
					<div class="col-md-3">
						<a style="text-decoration:none" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img class="img-fluid" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt=""></a>
						<div>
							<label for=""><a style="text-decoration:none; color:black" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?=$row['Ten_sp']?></a></label>							<label><span><a style="color:red;text-decoration:none" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a>đ</span>
                        <span><?php if ($row['Khuyen_mai']>=1){ echo "<del>". number_format($row['Gia_ban'],0,',','.')."đ</del>"."-".$row['Khuyen_mai']."%";}else{ echo "";} ?></span></label> 
						</div><br>
					</div>
				<?php }	?>
			</div>
			<?php 
				if((mysqli_num_rows($data['result'])>=4)){
			?>
			<div>
				<nav aria-label="Page navigation example">
				  	<ul class="pagination justify-content-center">
				    	<li class="page-item <?php $cr_page=$data['Page']; echo ($cr_page-1==0)? 'disabled':'' ?>">
				      		<a class="page-link" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&page=<?php echo $cr_page-1 ?>" tabindex="-1">Previous</a>
				    	</li>
						<?php
						$total=$data['Total'];
							for ($i=1; $i<=$total ; $i++) :
						?>
				    	<li class="page-item <?php echo (($cr_page==$i)? 'active':'') ?>"><a class="page-link" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&page=<?php echo $i ?>"><?php echo $i;?></a></li>
						<?php endfor; ?>
				    	<li class="page-item <?php echo ($cr_page==$total)? 'disabled': ''; ?>">
				      		<a class="page-link" href="/mvc/List_product/product&Id_dm=<?=$Id_dm?>&page=<?php echo $cr_page+1 ?>">Next</a>
				   		</li>
				  	</ul>
				</nav>
			</div>
			<?php 
				}elseif(mysqli_num_rows($data['result'])==0){
			?>			
			<div class="text-center" style="margin-top: 20vw;">
				<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-journal-medical" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                </svg>
				<h5 style="margin-top: 20px;">No products</h5>
			</div>
			<?php
				}
			?>
		</div>
	</div>
	<h5>Related Products</h5>
	<hr>
	<div class="col-md-12 container-fluid">
		<div class="row">
			<?php
				for ($i=1; $i <=16 ; $i++) { 
					$row=mysqli_fetch_array($data['ad_product'])
			?>
				<div class="col">
					<a style="text-decoration:none" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><img class="img-fluid" src="/mvc/public/image/<?=$row['Anh_sp']?>" alt=""></a>
					<div class="col">
						<a style="text-decoration:none" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?=$row['Ten_sp']?></a>
						<a style="text-decoration:none" class="text" href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>">
							<span><a style="text-decoration:none;color:red"  href="/mvc/detail_product/Detail&Id_sp=<?=$row['Id_sp']?>"><?php echo number_format($row['Gia_ban']*(100-$row['Khuyen_mai'])/100,0,',','.')?></a>đ</span>
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