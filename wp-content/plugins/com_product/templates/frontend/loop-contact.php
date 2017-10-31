<div class="page-right">
	<?php  
	$vHtml=new HtmlControl();
	/* begin load config contact */
	$width=$zendvn_sp_settings["product_width"];    
	$height=$zendvn_sp_settings["product_height"];      
	$contacted_phone=$zendvn_sp_settings['contacted_phone'];
	$email_to=$zendvn_sp_settings['email_to'];
	$address=$zendvn_sp_settings['address'];
	$to_name=$zendvn_sp_settings['to_name'];
	$telephone=$zendvn_sp_settings['telephone'];
	$website=$zendvn_sp_settings['website'];
	$opened_time=$zendvn_sp_settings['opened_time'];
	$opened_date=$zendvn_sp_settings['opened_date'];
	$contaced_name=$zendvn_sp_settings['contacted_name'];
	/* end load config contact */
	if(have_posts()){
		while (have_posts()) {
			the_post();
			?>
			<h3 class="page-title h-title"><?php the_title(); ?></h3>
			<div class="padding-left-15 padding-right-15">				
				<div class="margin-top-15">
					<div class="col-md-4 contact no-padding">
						<form method="post" name="frm" action="" enctype="multipart/form-data">
							<input type="hidden" name="action" value="contact" />                    
							<?php wp_nonce_field("change-info",'security_code',true);?>            
							<div class="margin-top-5"><input type="input" class="form-control" name="fullname" placeholder="Họ và tên" /></div>
							<div class="margin-top-5"><input type="input" class="form-control" name="email" placeholder="Email" /></div>
							<div class="margin-top-5"><input type="input" class="form-control" name="phone" placeholder="Điện thoại"/></div>
							<div class="margin-top-5"><input type="input" class="form-control" name="title" placeholder="Chủ đề" /></div>
							<div class="margin-top-5"><input type="input" class="form-control" name="address" placeholder="Địa chỉ" /></div>
							<div class="margin-top-5"><textarea name="content" class="form-control" placeholder="Nội dung"></textarea></div>
							<div class="margin-top-5">
								<input type="submit" name="btnSend" class="btn btn-default" value="Gửi" />					  
							</div>				
						</form>
					</div>
					<div class="col-md-8 contact-info no-padding-right">
						<div class="company-name"><?php echo $to_name; ?></div>
						<div class="contact-info-child">Địa chỉ: <?php echo $address; ?></div>
						<div class="contact-info-child">Website: <?php echo $website; ?></div>
						<div class="contact-info-child">E-mail: <?php echo $email_to; ?></div>
						<div class="contact-info-child">Tel: <font color="#D41010"><?php echo $telephone; ?></font></div>
					</div>
					<div class="clr"></div>
				</div>	
				<div class="margin-top-15">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3871.605543764119!2d108.07355431421081!3d13.982069195684272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDU4JzU1LjQiTiAxMDjCsDA0JzMyLjciRQ!5e0!3m2!1svi!2s!4v1508913801584" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>				
			</div>
			<?php
		}
		wp_reset_postdata();
	}
	?>	
</div>
