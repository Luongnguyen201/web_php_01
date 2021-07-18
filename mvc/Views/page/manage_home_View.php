        <section style="margin-left:5vw;" class="section-ql " style="width:85%;">
            <div class="text-center p-2 shd-ql"> 
                <span class="tt-ql">
                    DOANH THU (NGÀY/THÁNG/NĂM)
                </span> 
            </div>
            <div>
                <form action="/mvc/admin/home1" method="POST">
                    <div class="row">
                        <div>
                            <input type="date" name="date" class="form-control btn btn-info ">
                        </div>
                        <div style="margin-left: 5px;">
                            <input type="submit" name="check" value="Tìm ngày" class=" btn btn-info ">
                        </div>
                        <div style="margin-left: 30px;">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Doanh Thu Theo Tháng Năm <?=$data['year_from']?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php for($i=1; $i<=12; $i++): ?>
                                        <a class="dropdown-item" href="/mvc/admin/home1&SearchT=<?=$i?>"> Tháng <?=$i?></a>
                                    <?php endfor; ?> 
                                </div>
                            </div><hr>
                        </div>
                        <div style="margin-left: 30px;">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Doanh Thu Theo Năm
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php for($i=$data['y_to']; $i<=$data['year_from']; $i++): ?>
                                        <a class="dropdown-item" href="/mvc/admin/home1&Search=<?=$i?>"><?php echo $i;?></a>
                                    <?php endfor; ?>
                                </div>
                            </div><hr>
                        </div>
                    </div>  
                </form>
            </div>
            <div class="container">
                <hr>
                <div class="row">
                    <?php if(mysqli_num_rows($data['result'])!=0){ ?>
                    <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">
                        <span style="color: rgb(255, 0, 0);" >Doanh thu: <?=$data['date']?></span>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th></th>
                                    <th scope="col">ID khách hàng</th>
                                    <th scope="col">Họ và tên - Fullname</th>
                                    <th scope="col">Phương thức thanh toán</th>
                                    <th scope="col">Giá đơn</th>
                                    <th scope="col">Ngày lập</th>
                                    <th scope="col">Tình trạng</th>
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
                                    <td><?=$row['Id_kh']?></td>
                                    <td><?=$row['Fullname']?></td>
                                    <?php foreach($data['pttt'] as $PT):
                                        if($row['Id_pttt']==$PT['Id']){
                                    ?>
                                        <td><?=$PT['Ordername']?></td>
                                    <?php } endforeach; ?>
                                    <td><?php echo number_format($row['Gia_don'],0,',','.')?></td>
                                    <td><?=$row['Ngay_lap']?></td>
                                    <?php foreach($data['ttdh'] as $ttdh):
                                            if($row['Tinh_trang']==$ttdh['Id']):
                                    ?>  
                                    <td><?=$ttdh['Name']?></td>
                                    <?php endif; endforeach; ?>
                                    <td>
                                        <a href="/mvc/admin/Detail_order&Id_dh=<?=$row['Id']?>" class="btn btn-outline-primary btn-sm">Details Order</a>
                                    </td>
                                    </tr>
                                <?php endwhile;?>    
                                </tbody>
                            </table>
                        </div>       
                    </div>    
                    <div class="col col-sm-12" style="border: rgb(165, 165, 165) 1px solid; border-radius: 10px; margin-top: 30px;">  
                        <span style="color: rgb(255, 0, 0);" >Thống Kê</span>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tổng Đơn Hàng</th>
                                        <th>Số Lượng Sản Phẩm Bán</th>
                                        <th>Doanh Thu(đ)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $data['T_sl_don']; ?></td>
                                        <td><?php echo $data['T_sl_sp']; ?></td>
                                        <td><?php echo number_format($data['Thanh_t'],0,',','.'); ?> đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>       
                    </div>
                </div>
                <hr><br>
            </div>
            <?php }else{  ?>  
                        <?php if(($data['date']!=null)){ ?>
                            <div style="margin-left:30vw; margin-top:5vw;" class="text-center">
                                <svg  xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-journal-medical" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                </svg>
                                <h5 style="margin-top:20px;">Không có đơn hàng nào <?=$data['date']?></h5>
                            </div>
                        <?php }else{ ?>    
                            <div style="margin-left:30vw; margin-top:5vw;" class="text-center">
                                <h5>Bạn chưa chọn ngày-tháng-năm</h5>
                            </div>  
                    <?php } }?>
        </section>