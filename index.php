<?php require "view/v_heading.php";?>
<?php require "view/v_navbar.php";?>
<?php require "view/v_sidebar.php";?>
<?php date_default_timezone_set("Asia/jakarta"); ?>
<div class="content-wrapper container-fluid">

<header>
    <h2>Aplikasi Enkripsi dan Dekripsi File TXT</h2>
    <p>Aplikasi ini merupakan produk dari penerapan algoritma kombinasi CBC (Cipher Block Chaining) dan RC4 (Rivest Cipher 4).</p>
    <p><b><span id="jam" style="font-size:24"></span>  Waktu Indonesia Barat</b></p>

    <div class="logo">
        <img src="" alt="">
        <img src="" alt="">
    </div>
</header>

<div class="menu">
    <div class="row">

        <div class="col-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3></h3>
                    <p>Panduan</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-book"></i>
                </div>
                <a href="panduan.php" class="small-box-footer">
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3></h3>
                    <p>Enkripsi File</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-lock"></i>
                </div>
                <a href="v_enkripsi.php" class="small-box-footer">
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3></h3>
                    <p>Dekripsi File</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-unlock"></i>
                </div>
                <a href="v_dekripsi.php" class="small-box-footer">
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        
        
    </div>
</div>

</div>

</div>

<script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
</script>

<?php require "view/v_footer.php";?>