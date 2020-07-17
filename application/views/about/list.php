<!-- start banner Area -->
<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?= $title; ?>				
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> About Us</a></p> -->
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start quote Area -->
			<!-- <section class="quote-area pt-100">
				<div class="container">				
					<div class="row">
						<div class="col-lg-6 quote-left">
							<h1>
								<span>Music</span> gives soul to the universe, <br>
								wings to the <span>mind</span>, flight <br>
								to the <span>imagination</span>.
							</h1>
						</div>
						<div class="col-lg-6 quote-right">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</p>
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End quote Area -->			

			<!-- Start about info Area -->
			<section class="section-gap info-area" id="about">
				<div class="container">
                    <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dempster Shafer</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Certainty Factor</a>
                    </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                        <div class="row d-flex justify-content-center">
                            <div class="menu-content pb-40 col-lg-8">
                                <div class="title text-center">
                                    <h1 class="mb-10">Sedikit Penjelasan Metode</h1>
                                    <!-- <p>Who are in extremely love with eco friendly system.</p> -->
                                </div>
                            </div>
                        </div>					
                        <div class="single-info row mt-40">
                            <div class="col-lg-2 col-md-12 mt-120 text-center no-padding info-left">
                                <div class="info-thumb">
                                    <img src="img/pages/about-img.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 no-padding info-rigth">
                                <div class="info-content">
                                    <h2 class="pb-30">Dempster Shafer</h2>
                                    <p>
                                        Metode Dempster-Shafer pertama kali diperkenalkan oleh Arthur P. Dempster and Glenn Shafer, yang melakukan percobaan model ketidakpastian dengan range probabilitas sebagai probabilitas tunggal. Kemudian teori Dempster dipublikasikan di buku dengan judul Mathematical Theory of Evident pada tahun 1976.
                                    </p>
                                    <br>
                                    <p>
                                        Teori Dempster-Shafer merupakan teori matematika dari evidence. Teori tersebut dapat memberikan sebuah cara untuk menggabungkan evidence dari beberapa sumber dan mendatangkan atau memberikan tingkat kepercayaan dari evidence yang tersedia.								
                                    </p>
                                    <br>
                                    <p>
                                        Secara umum teori Dempster-Shafer ditulis dalam suatu interval : <b>[Belief, Plausibility]</b><br>
                                        <b><i>Believe</i></b> adalah ukuran kepercayaan terhadap evidence/gejala. Jika bernilai 0 maka mengindikasikan bahwa tidak ada kepastioan, dan jika bernilai 1 menunjukkan adanya kepastian.
                                        Data <i>believe</i> didapat dari inputan pakar.
                                    </p>
                                    <br>
                                    <p>
                                        <b><i>Plausibility</i></b> adalah ukuran ketidakpercayaan terhadap evidence/gejala. Jika bernilai 1 maka mengindikasikan bahwa tidak ada kepastioan, dan jika bernilai 0 menunjukkan adanya kepastian.
                                        Data <i>palusability</i> didapat dari 1 - <i>believe</i>
                                    </p>
                                    <br>
                                    <p>
                                        Pada teori Dempster-Shafer kita mengenal adanya <i>frame of discernment</i> (FOD) yang dinotasikan dengan <b>θ</b> dan mass function yang dinotasikan dengan <b>m</b>. FOD adalah semesta pembicaraan dari sekumpulan hipotesis sehingga sering disebut dengan environment. Sedangkan mass function (m) dalam teori Dempster-Shafer adalah tingkat kepercayaan dari suatu evidence (gejala), sering disebut dengan evidence measure sehingga dinotasikan dengan (m).
                                    </p>
                                    <br>
                                    <p>
                                        Pada aplikasi sistem terdapat sejumlah evidence yang akan digunakan pada faktor ketidakpastian dalam pengambilan keputusan untuk diagnosa suatu penyakit. Untuk mengatasi sejumlah evidence tersebut gunakan aturan yang lebih dikenal dengan Dempster’s Rule of Combination, yaitu:
                                    </p>
                                    <br>
                                    <img src="<?= base_url() ?>assets/templates/users/img/Rumus_ds1.jfif" alt="rumus_ds">
                                    <br>
                                    <p>
                                        Dimana :
                                        <ol>
                                            <li>1. <b>M3(Z)</b> = mass function dari evidence z</li>
                                            <li>2. <b>M1(X)</b> = mass function dari evidence x</li>
                                            <li>3. <b>M2(Y)</b> = mass function dari evidence y</li>
                                            <li>4. <b>∑X∩Y m1(X).m2(Y)</b> = adalah jumlah dan irisannya pada perkalian m1 dan m2</li>
                                            <li>5. <b>K</b> = jumlah konflik evidence apabila irisannya kosong.</li>
                                        </ol>
                                    </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <br>
                        <div class="row d-flex justify-content-center">
                            <div class="menu-content pb-40 col-lg-8">
                                <div class="title text-center">
                                    <h1 class="mb-10">Sedikit Penjelasan Metode</h1>
                                    <!-- <p>Who are in extremely love with eco friendly system.</p> -->
                                </div>
                            </div>
                        </div>					
                        <div class="single-info row mt-40">
                            <div class="col-lg-2 col-md-12 mt-120 text-center no-padding info-left">
                                <div class="info-thumb">
                                    <img src="img/pages/about-img.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 no-padding info-rigth">
                                <div class="info-content">
                                    <h2 class="pb-30">Certainty Factor</h2>
                                    <p>
                                        Sebelum masuk ke CF, kita harus tahu dulu kalau CF termasuk dalam Sistem Pakar bukan Sistem Pendukung Keputusan. Sistem Pakar / Expert System adalah sistem informasi yang berisi dengan pengetahuan dari pakar sehingga dapat digunakan untuk konsultasi. Pengetahuan dari pakar di dalam sistem ini digunakan sebagi dasar oleh Sistem Pakar untuk menjawab pertanyaan (konsultasi). Tujuan Sistem Pakar adalah untuk mentransfer kepakaran dari seorang pakar ke komputer, kemudian ke orang lain (yang bukan pakar).
                                    </p>
                                    <br>
                                    <p>
                                        Metode <b><i>Certainty factor</i> (CF)</b> diusulkan oleh Shortliffe dan Buchanan pada tahun 1975. CF merupakan nilai parameter klinis yang diberikan MYCIN untuk menunjukkan besarnya kepercayaan. Teori ini berkembang bersamaan dengan pembuatan sistem pakar MYCIN. Tim pengembang MYCIN mencatat bahwa dokter seringkali menganalisa informasi yang ada dengan ungkapan seperti misalnya : mungkin, kemungkinan besar, hampir pasti. Untuk mengakomodisi hal ini tim MYCIN menggunakan CF guna menggambarkan tingkat keyakinan pakar terhadap masalah yang sedang dihadapi.								
                                    </p>
                                    <br>
                                    <p>
                                        Sebelum belajar rumus, ada beberapa istilah yang dipakai dalam metode CF, yaitu:
                                        <br>
                                        1. EVIDENCE, Yaitu fakta / gejala yang mendukung hipotesa. Misal gejala penyakit.
                                        <br>
                                        2. HIPOTESA, Yaitu hasil yang dicari / hasil yang didapat dari gejala-gejala. Misal penyakit
                                        <br>
                                        3. CF[H, E], Adalah certainty factor dari hipotesis H yang dipengaruhi oleh gejala (evidence) E.
                                        <br>
                                        Besarnya CF berkisar antara –1 sampai dengan 1.
                                        <br>
                                        Nilai –1 menunjukkan ketidakpercayaan mutlak sedangkan nilai 1 menunjukkan kerpercayaan mutlak.
                                        <br>
                                        4. MB, Adalah ukuran kenaikan kepercayaan ( measure of increased belief ), 0 <= MB <=1
                                        <br>
                                        5. MD, Adalah ukuran kenaikan ketidakpercayaan ( measure of increased disbelief ), 0 <= MD <=1
                                    </p>
                                    <br>
                                    <p>
                                        Ada banyak rumus untuk mencari CF, yaitu tergantung data yang diketahui. Berikut daftar rumus CF berdasarkan data yang diketahui nya:
                                    </p>
                                    <br>
                                    <h4>Rumus 1</h4>
                                    <p>
                                        Jika data yang diketahui adalah 1 hipotesa mempunyai 1 evidence, 1 MB, dan 1 MD. <br>
                                        Maka hasil yang dicari adalah besarnya kepercayaan (CF) pada hipotesa ini. <br>
                                        Rumusnya adalah: <br><br>
                                        <b>CF[H, E] = MB[H, E] - MD[H, E]</b>
                                        <br><br>
                                        Dimana:
                                        <br>
                                        1. CF[H, E] : cf dari hipotesis yang dipengaruhi evidence <br>
                                        2. MB(H,E) : besar kepercayaan hipotesis per evidence <br>
                                        3. MD(H,E) : besar ketidakpercayaan hipotesis per evidence
                                    </p>
                                    <br>
                                    <h4>Rumus 2</h4>
                                    <p>
                                        Jika data yang diketahui adalah 1 hipotesa mempunyai 1 CF rule, 1 evidence, dan 1 CF evidence. <br>
                                        Maka hasil yang dicari adalah besarnya kepercayaan (CF) pada hipotesa ini. <br>
                                        Rumusnya adalah: <br><br>
                                        <b>CF[H, E] = CF[E] * CF[Rule]</b>
                                        <br><br>
                                        Dimana:
                                        <br>
                                        1. CF[H, E] : cf dari hipotesis yang dipengaruhi evidence <br>
                                        2. CF[E] = besar CF dari evidence <br>
                                        3. CF[Rule] = besar CF dari pakar
                                    </p>
                                    <br>
                                    <h4>Rumus 3</h4>
                                    <p>
                                        Jika data yang diketahui adalah 1 hipotesa mempunyai 1 CF rule, banyak evidence, dan banyak CF evidence. <br>
                                        Serta menggunakan rule KONJUNGSI seperti if E1 AND E2 AND En, THEN H. <br>
                                        Maka hasil yang dicari adalah besarnya kepercayaan (CF) pada hipotesa ini. <br>
                                        Rumusnya adalah: <br><br>
                                        <b>CF[H, E] = min { CF[E1] | CF[E1] | CF[En] } * CF[Rule]</b> <br><br>

                                        Dimana: <br>

                                        1. CF[H, E] : cf dari hipotesis yang dipengaruhi evidence <br>
                                        2. CF[E] = besar CF dari evidence <br>
                                        3. CF[Rule] = besar CF dari pakar
                                    </p>
                                    <br>
                                    <h4>Rumus 4</h4>
                                    <p>
                                        Jika data yang diketahui adalah 1 hipotesa mempunyai 1 CF rule, banyak evidence, dan banyak CF evidence. <br>
                                        Serta menggunakan rule DISJUNGSI seperti if E1 OR E2 OR En, THEN H. <br>
                                        Maka hasil yang dicari adalah besarnya kepercayaan (CF) pada hipotesa ini. <br>
                                        Rumusnya adalah: <br><br>
                                        <b>CF[H, E] = max { CF[E1] | CF[E1] | CF[En] } * CF[Rule]</b><br><br>

                                        Dimana: <br>

                                        1. CF[H, E] : cf dari hipotesis yang dipengaruhi evidence <br>
                                        2. CF[E] = besar CF dari evidence <br>
                                        3. CF[Rule] = besar CF dari pakar
                                    </p>
                                    <br>
                                    <h4>Rumus 5</h4>
                                    <p>
                                        Jika data yang diketahui adalah banyak hipotesa mempunyai banyak evidence, dan banyak CF evidence. <br>
                                        Serta menggunakan rule KONJUNGSI seperti if E1 AND E2 AND En, THEN H. <br>
                                        Maka hasil yang dicari adalah CF Kombinasi terlebih dahulu <br>
                                        CF kombinasi pada awalnya mencari 2 CF terlebih dahulu. Lalu hasil CF tersebut dihitung lagi dengan CF selanjutnya. Sampai semua CF selesai dihitung. <br>
                                        Rumus CF kombinasi tergantung nilai CF, yaitu: <br><br>

                                        Jika kedua CF > 0, maka rumusnya adalah: <br>

                                        <b>CF[H, E] = CF[lama] + CF[baru] (1 - CF[lama])</b><br><br>


                                        Jika kedua CF < 0, maka rumusnya adalah: <br>

                                        <b>CF[H, E] = CF[lama] + CF[baru] (1 + CF[lama])</b><br><br>


                                        Jika kedua salah satu CF < 0, maka rumusnya adalah: <br>

                                        <b>CF[H, E] = CF[lama] + CF[baru] / 1 - min(CF[lama] | CF[lama])</b><br><br>

                                        Dimana: <br>

                                        1. CF[H, E] : cf dari hipotesis yang dipengaruhi evidence <br>
                                        2. CF[lama] = CF pertama atau CF hasil perhitungan sebelumnya <br>
                                        3. CF[baru] = CF kedua atau CF selanjutnya
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
					
				</div>
			</section>
			<!-- End about info Area -->
