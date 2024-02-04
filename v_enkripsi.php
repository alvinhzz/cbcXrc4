<?php require "view/v_heading.php";?>
<?php require "view/v_navbar.php";?>
<?php require "view/v_sidebar.php";?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <!-- Horizontal Form -->
       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Enkripsi File</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="crypto/enkripsiModel1.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputFileEnkripsi" class="col-sm-2 col-form-label">File input</label>
                      <div class="col-sm-10">
                      <input type="file" class="form-control" id="inputFileEnkripsi" name="inputFileEnkripsi" accept=".txt" required>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="Kunci" class="col-sm-2 col-form-label">Kunci</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="kunci" name="kunci" placeholder="Masukan kunci maksimal 14 karakter" required maxlength="14" pattern="[a-zA-Z0-9_]{1,14}$">
                      <input type="checkbox" onclick="hideShowPassword()"> Lihat Kunci
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer center">
                  <button type="submit" name="submit" class="btn btn-success">Enkripsi</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

       <!-- Small boxes (Stat box) -->
       <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h5>Running Time</h5>
                <?php if (isset($_GET['time'])) {
                    echo "<h3>" . $_GET['time'] . "</h3>";
                    echo "<h5> detik </h5>";
                  }else {
                    echo "<h3>0</h3>";
                    echo "<h5>detik</h5>";
                } ?>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>    
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h5>Panjang Plaintext</h5>
                <?php if (isset($_GET['time'])) {
                    echo "<h3>" . $_GET['plaintextCount'] . "</h3>";
                    echo "<h5> karakter </h5>";
                  }else {
                    echo "<h3>0</h3>";
                    echo "<h5>karakter</h5>";
                } ?>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>    
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h5>Panjang Ciphertext</h5>
                <?php if (isset($_GET['time'])) {
                    echo "<h3>" . $_GET['ciphertextCount'] . "</h3>";
                    echo "<h5> karakter </h5>";
                  }else {
                    echo "<h3>0</h3>";
                    echo "<h5>karakter</h5>";
                } ?>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>    
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner">
                <?php if (isset($_GET['time'])) {
                    ?>
                      <h5>Silahkan Download</h5>
                      <br>
                      <form action="downloadFile/downloadEnkripsi.php">
                        <input type="submit" value="Download File" class="btn btn-success">
                      </form>
                    <?php
                  }else {
                    ?>
                      <h5>Tidak ada file</h5>
                      <br>
                      <form action="#">
                        <input type="submit" value="Download File" class="btn btn-success" disabled>
                      </form>
                    <?php
                } ?>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-down-c"></i>
              </div>    
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require "view/v_footer.php";?>
