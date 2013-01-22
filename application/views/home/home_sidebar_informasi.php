<!-- ganti jadi halaman biasa -->
	<div class="span3">
            <div class="roe">
               <p class="breadcrumb">Informasi</p><br>   
               <ul>
                   <li>
                       <a href="<?php echo base_url();?>home/informasi">Tentang Kami</a>
                   </li>
                   <li>
                       <a href="<?php echo base_url();?>home/cara_pembelian">Cara Pembelian</a>
                   </li>
                   <li>
                       <a href="<?php echo base_url();?>home/garansi">Penjelasan Garansi</a>
                   </li>
               </ul>
            </div>        
            <br>
            <div class="roe">
                <p class="breadcrumb">Support</p><br>                                
                <a href=ymsgr:sendIM?<?php echo $profile['ym'];?>><img src="http://opi.yahoo.com/online?u=<?php echo $profile['ym'];?>&m=g&t=15"></a>                
            </div>  
            <br>
            <div class="roe" style="text-align: center;">
                <p class="breadcrumb">Pembayaran Via</p><br>                                
                <a href="<?php echo base_url();?>home/cara_pembelian"><img src="<?php echo base_url();?>res/image/payment1.jpg"></a>
            </div>  
        </div>
	<!-- end halaman biasa -->
