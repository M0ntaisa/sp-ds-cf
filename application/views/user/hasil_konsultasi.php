<!-- start banner Area -->
<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?= $title; ?>
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="elements.html"> Elements</a></p> -->
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

            <!-- Start Consult Result -->
                <section class="sample-text-area">
                    <div class="container">
						<h3 class="text-heading">Hasil Konsultasi</h3>
						<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dempster Shafer</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Certainty Factor</a>
						</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<?php 
								if( $this->session->flashdata('gagal') ) {
									echo '<div class="alert-wrap2 shadow-reset wrap-alert-b">';
									echo    '<div class="alert alert-danger">';
									echo        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
									echo        "<strong>Proses gagal! </strong>".$this->session->flashdata('gagal')."</div></div>";
								} else {
									// echo "Proses :"."<br>";
									// for ($i=0; $i < count($riwayat) ; $i++) { 
									// 	foreach($riwayat[$i] as $key => $value) {
									// 		echo "$key is at $value"."<br>";
									// 	}
									// 	echo "<br>";
									// }

									// echo "Hasil Akhir :"."<br>";
									// foreach($h_akhir as $key => $value) {
									// 	echo "$key is at $value"."<br>";
									// }
									$this->Konsultasi_model->proses();
								}
							?>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<?php $this->Konsultasi_model->prosesCF(); ?>
						</div>
						</div>
                    </div>
                </section>

            <!-- End Consult Result -->


			