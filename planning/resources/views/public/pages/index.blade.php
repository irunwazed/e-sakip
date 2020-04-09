<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>E-SAKIP | Konawe Kepulauan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="/template/awal/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/template/awal/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/template/awal/assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="/template/awal/assets/css/owl-carousel.css">

    
    <!-- toast -->
    <link href="/template/admin/assets/js/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/template/admin/assets/js/toastr/toastr.js"></script>
    <style>
    
    .my-button {
        height: 50px;
        margin: 10px;
    }
    
    </style>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <!-- <img src="/images/logo.png" alt="logo" style="width:5%;"> -->
                            E-SAKIP
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="position: absolute; right: 0px;">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="#about">Tentang</a></li>
                            <li class="scroll-to-section"><a href="#laporan">Laporan</a></li>
                            <li class="scroll-to-section"><a href="{{ url('masuk') }}" >Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row" style="padding-top: 50px;">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1> <strong>Selamat Datang</strong></h1>
                        <p>Sistem Akuntabilitas Kinerja Instansi Pemerintah yang selanjutnya disingkat SAKIP, adalah rangkaian sistematik dari berbagai aktivitas, alat, dan prosedur yang dirancang untuk tujuan penetapan dan pengukuran, pengumpulan data, pengklasifikasian, pengikhtisaran, dan pelaporan kinerja pada instansi pemerintah, dalam rangka pertanggungjawaban dan peningkatan kinerja instansi pemerintah.</p>
                        <a href="#about" class="main-button-slider">Cari tahu!</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="/template/awal/assets/images/slider-icon.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="/template/awal/assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                    <div style="position: absolute; top: 30px;">
                    <!-- <div class="rounded img-fluid d-block mx-auto"> -->
                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center "></div>
                                    </div>
                                    <div class="col-4">
                                        <a onclick="setLaporanInput(1)" href="#laporan" class="btn btn-primary d-flex justify-content-center  my-button">Perencanaan Kinerja</a>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center "></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#laporan" onclick="setLaporanInput(4)" class="btn btn-primary d-flex justify-content-center my-button">Evaluasi Kinerja</a>
                                    </div>
                                    <div class="col-4">
                                    </div>
                                    <div class="col-4">
                                        <a href="#laporan" onclick="setLaporanInput(2)" class="btn btn-primary d-flex justify-content-center my-button">Pengukuran Kinerja</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center "></div>
                                    </div>
                                    <div class="col-4">
                                        <a href="#laporan" onclick="setLaporanInput(3)" class="btn btn-primary d-flex justify-content-center my-button">Pelaporan Kinerja</a>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center "></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>Pelaporan</h5>
                    </div>
                    <div class="left-text">
                        <p>Kegiatan adalah bagian dari program yang dilaksanakan oleh satu atau beberapa satuan kerja pada kementerian negara/lembaga atau unit kerja pada SKPD sebagai bagian dari pencapaian sasaran terukur pada suatu program dan terdiri dari sekumpulan tindakan pengerahan sumber daya baik yang berupa personil (sumber daya manusia), barang modal termasuk peralatan dan teknologi, dana, atau kombinasi dari beberapa atau kesemua jenis sumber daya tersebut sebagai masukan (input) untuk menghasilkan keluaran (output) dalam bentuk barang/jasa.</p>
                        <a href="{{ url('masuk') }}" class="main-button">Lihat Laporan</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="laporan">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-12 col-md-12 col-sm-12 mobile-bottom-fix" style="min-height: 400px; padding-top:100px">
                    <div class="left-heading">
                        <h5>Laporan</h5>
                    </div>
                    <form action="/#olah-laporan">
                        <div class="row">
                            <div class="position-relative form-group col-sm-3">
                                <label>OPD </label>
                                <select class="form-control" name="opd" required>
                                    @foreach(@$dataOpd as $row)
                                    <option  <?=@session('kota_kode').'-'.@session('opd_kode')==$row->kota_kode.'-'.$row->opd_kode?'selected':''?> value="{{ $row->kota_kode.'-'.$row->opd_kode }}">{{ $row->opd_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group col-sm-3">
                                <label>Laporan</label>
                                <select class="form-control" name="laporan" required>
                                    <option <?=@$_GET['laporan']==1?'selected':''?> value="1">Renstra</option>
                                    <option <?=@$_GET['laporan']==2?'selected':''?> value="2">Iku</option>
                                    <option <?=@$_GET['laporan']==3?'selected':''?> value="3">Perjanjian Kinerja</option>
                                    <option <?=@$_GET['laporan']==4?'selected':''?> value="4">Renja</option>
                                    <option <?=@$_GET['laporan']==5?'selected':''?> value="5">Realisasi Anggaran</option>
                                </select>
                            </div>
                            <div class="position-relative form-group col-sm-3">
                                <label>Tahun </label>
                                <select class="form-control" name="tahun" required>
                                    <option <?=@session('tahun')==1?'selected':''?> value="1">2016</option>
                                    <option <?=@session('tahun')==2?'selected':''?> value="2">2017</option>
                                    <option <?=@session('tahun')==3?'selected':''?> value="3">2018</option>
                                    <option <?=@session('tahun')==4?'selected':''?> value="4">2019</option>
                                    <option <?=@session('tahun')==5?'selected':''?> value="5">2020</option>
                                </select>
                            </div>
                            <div class="position-relative form-group col-sm-2" style="padding-top: 32px;">
                                <button class="btn btn-primary">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                    <div id="laporan-daftar">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    
    $judul = '';
    $link = '';
    $laporanShow = 'display: none;';
    if(@$_GET['laporan']){
        $laporanShow = 'display: block;';
        if($_GET['laporan'] == 1){
            $judul = 'Renstra';
            $link = '/laporan/renstra';
        }else if($_GET['laporan'] == 2){
            $judul = 'Indikator Kinerja Utama';
            $link = '/laporan/iku';
        }else if($_GET['laporan'] == 3){
            $judul = 'Perjanjian Kinerja';
            $link = '/laporan/perjanjian-kinerja';
        }else if($_GET['laporan'] == 4){
            $judul = 'Renja';
            $link = '/laporan/renja';
        }else if($_GET['laporan'] == 5){
            $judul = 'Realisasi Anggaran';
            $link = '/laporan/anggaran';
        }
    }
    
    ?>
    
    <section class="section" id="olah-laporan" style="<?=$laporanShow?>">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix" style="min-height: 400px; padding-top:100px">
                    <div class="left-heading">
                        <h5><?=$judul?></h5>
                        <br>
                    </div>
                    <form action="<?=$link?>" method="POST" target="_blank">
                    {!! csrf_field() !!}
                        <div class="row">
                            <?php if(@$_GET['laporan'] == 5){ ?>
                            <div class="position-relative form-group col-sm-6">
                                <select class="form-control" name="triwulan" required>
                                    <option value="1">Triwulan 1</option>
                                    <option value="2">Triwulan 2</option>
                                    <option value="3">Triwulan 3</option>
                                    <option value="4">Triwulan 4</option>
                                </select>
                            </div>
                            <?php } ?>
                            <div class="position-relative form-group col-sm-4">
                                <select class="form-control" name="cetak" required>
                                    <option value="1">Print</option>
                                    <option value="2">PDF</option>
                                </select>
                            </div>
                            <div class="position-relative form-group col-sm-2">
                                <button class="btn btn-primary" >Tampilkan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="right-image col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="/template/awal/assets/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Small Start ***** -->
    <!-- <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="/template/awal/assets/images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title">First Box Service</h5>
                        <p>Aenean vulputate massa sed neque consectetur, ac fringilla quam aliquet. Sed a enim nec eros tempor cursus at id libero.</p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="/template/awal/assets/images/service-icon-02.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Second Box Title</h5>
                        <p>Pellentesque vitae urna ut nisi viverra tristique quis at dolor. In non sodales dolor, id egestas quam. Aliquam erat volutpat. </p>
                        <a href="#" class="main-button">Discover More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="/template/awal/assets/images/service-icon-03.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Third Title Box</h5>
                        <p>Quisque finibus libero augue, in ultrices quam dictum id. Aliquam quis tellus sit amet urna tincidunt bibendum.</p>
                        <a href="#" class="main-button">More Detail</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="/template/awal/assets/images/service-icon-02.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Fourth Service Box</h5>
                        <p>Fusce sollicitudin feugiat risus, tempus faucibus arcu blandit nec. Duis auctor dolor eu scelerisque vestibulum.</p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="/template/awal/assets/images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Fifth Service Title</h5>
                        <p>Curabitur aliquam eget tellus id porta. Proin justo sapien, posuere suscipit tortor in, fermentum mattis elit.</p>
                        <a href="#" class="main-button">Discover</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="/template/awal/assets/images/service-icon-03.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Sixth Box Title</h5>
                        <p>Ut nibh velit, aliquam vitae pellentesque nec, convallis vitae lacus. Aliquam porttitor urna ut pellentesque.</p>
                        <a href="#" class="main-button">Detail</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="/template/awal/assets/images/service-icon-01.png" alt=""></i>
                        </div>
                        <h5 class="service-title">Seventh Title Box</h5>
                        <p>Sed a consequat velit. Morbi lectus sapien, vestibulum et sapien sit amet, ultrices malesuada odio. Donec non quam.</p>
                        <a href="#" class="main-button">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ***** Features Small End ***** -->


    <!-- ***** Frequently Question Start ***** -->
    <!-- <section class="section" id="frequently-question">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="section-heading">
                        <p>Vivamus venenatis eu mi ac mattis. Maecenas ut elementum sapien. Nunc euismod risus ac lobortis congue. Sed erat quam.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12">
                    <h5>Class aptent taciti sociosqu ad litora torquent per conubia</h5>
                    <div class="accordion-text">
                        <p>Curabitur placerat diam in risus lobortis, laoreet porttitor est elementum. Nulla ultricies risus quis risus scelerisque, a aliquam tellus maximus. Cras pretium nulla ac convallis iaculis. Aenean bibendum erat vitae odio sodales, in facilisis tellus volutpat.</p>
                        <p>Sed lobortis pellentesque magna ac congue. Suspendisse quis molestie magna, id eleifend ex. Ut mollis ultricies diam nec dictum. Morbi commodo hendrerit mi vel vulputate. Proin non tincidunt dui. Lorem ipsum dolor sit amet.</p>
                        <span>Email: <a href="#">email@company.com</a><br></span>
                        <a href="#contact-us" class="main-button">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="accordions is-first-expanded">
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>First Common Question</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Duis vulputate porttitor urna sit amet pretium. Phasellus sed pulvinar eros, condimentum consequat ex. Suspendisse potenti.
                                    <br><br>
                                    Pellentesque maximus lorem sed elit imperdiet mattis. Duis posuere mauris ut eros rutrum sodales. Aliquam erat volutpat.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Second Question Answer</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Sed odio elit, cursus sed consequat at, rutrum eget augue. Cras ac eros iaculis, tempor quam sit amet, scelerisque mi. Quisque eu risus eget nunc porttitor vestibulum at a ante.
                                    <br><br>
                                    Praesent ut placerat turpis, vel pellentesque dolor. Sed rutrum eleifend tortor, eu luctus orci sagittis in. In blandit fringilla mollis.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Third Answer for you</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Proin feugiat ante ut vulputate rutrum. Nam quis erat turpis. Nullam maximus pharetra lorem, eu condimentum est iaculis ut. Pellentesque mattis ultrices dignissim. 
                                    <br><br>
                                    Etiam et enim finibus, feugiat massa efficitur, finibus sapien. Sed cursus lacus quis arcu scelerisque, eget ornare risus maximus. Aenean non lectus id odio rhoncus pharetra.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Fourth Question Asked</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Phasellus eu purus ornare, eleifend orci nec, egestas nulla. Sed sed aliquet sapien. Proin placerat, ipsum eu posuere blandit, tellus quam consectetur nisi, id sollicitudin diam ex at nisi.
                                    <br><br>
                                    Aenean fermentum eget turpis egestas semper. Sed finibus mollis venenatis. Praesent at sem in massa iaculis pharetra.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Fifth Ever Question</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Quisque aliquet ipsum ut magna rhoncus, euismod lacinia elit rhoncus. Sed sapien elit, mollis ut ultricies quis, fermentum nec ante.
                                    <br><br>
                                    Sed nec ex nec tortor fermentum sollicitudin id ut ligula. Ut sagittis rutrum lectus, non sagittis ante euismod eu. </p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Sixth Sense Question</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Suspendisse potenti. Ut dapibus leo ut massa vulputate semper. Pellentesque maximus lorem sed elit imperdiet mattis. Duis posuere mauris ut eros rutrum sodales. Aliquam erat volutpat.</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ***** Frequently Question End ***** -->


    <!-- ***** Contact Us Start ***** -->
        <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
    -->
    <!-- <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Full Name" required="" class="contact-field">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" placeholder="E-mail" required="" class="contact-field">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Your Message" required="" class="contact-field"></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send It</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ***** Contact Us End ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2020 E-SAKIP Konawe Kepulauan
                
                . Design: <a rel="nofollow" href="https://www.instagram.com/codexv.group/">Code XV</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/template/awal/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="/template/awal/assets/js/popper.js"></script>
    <script src="/template/awal/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="/template/awal/assets/js/owl-carousel.js"></script>
    <script src="/template/awal/assets/js/scrollreveal.min.js"></script>
    <script src="/template/awal/assets/js/waypoints.min.js"></script>
    <script src="/template/awal/assets/js/jquery.counterup.min.js"></script>
    <script src="/template/awal/assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="/template/awal/assets/js/custom.js"></script>

    <script>
    
    var link = 'laporan';
    var base_url = '{{ url("") }}/';

    function setLaporanInput(val){
        console.log(val);
        $('select[name="laporan"]').val(val);
    }

    function loadLaporan(){
        let val = $('select[name="laporan"]').val();


        if(val == 1){
            _jenis = 'perencanaan';
        }else if(val == 2){
            _jenis = 'pengukuran';
        }else if(val == 3){
            _jenis = 'pelaporan';
        }else if(val == 4){
            _jenis = 'evaluasi';
        }



    }

    function setLaporan(data){
        $('#laporan-daftar').html(data);
    }

    function sendAjax(url, dataKirim){
        loading();
        return $.ajax({
        type: "POST",
        url: url,
        dataType: "JSON",
        data: dataKirim, 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(respon)
        {   
            loading(false);
            if(respon.status){
                message(respon.pesan);
            }else{
            message(respon.pesan, '', 'warning');
            }
            // console.log(respon);
        },
        error:function(error){
            loading(false);
            message('Gagal terhubung pada server!', '', 'error');
            // console.log(error);
            // $("#myerror").html(error.responseText);
        }
        });
    }

    
    function loading(status = true){
        if(status){
            $("#loading").text("loading");
        }else{
            $("#loading").text("");
        }
    }

    function message(pesan = "", judul = '', status = 'success'){
        if(pesan != '')
            toastr[status](judul, pesan)
    }

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "rtl": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    
    </script>

  </body>
</html>