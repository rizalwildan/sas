Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi SPP
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-xs-12">

             <div class="row">
                    <div class="col-sm-6">
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Tahun Ajaran 
                          <select class="form-control input-sm" aria-controls="example1" name="example1_length">
                            <option value="X1">--Pilih Tahun Ajaran--</option>
                            <option value="X2">2014/2015</option>
                            <option value="X3">2015/2016</option>
                          </select>
                          </label>
                        </div>
                      </div>
              </div>

              <div class="row">
                    <div class="col-sm-6">
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Transaksi Bulan 
                          <select class="form-control input-sm" aria-controls="example1" name="example1_length">
                            <option value="X1">--Pilih Tahun Ajaran--</option>
                            <option value="X2">Juli</option>
                            <option value="X3">Agustus</option>
                          </select>
                          </label>
                        </div>
                      </div>
              </div>

               <div class="row">
                    <div class="col-sm-6">
                      <div id="example1_length" class="dataTables_length">
                        <label>
                          Cari Berdasarkan 
                          <select class="form-control input-sm" aria-controls="example1" name="example1_length">
                            <option value="Nim">Nim</option>
                            <option value="Nama">Nama</option>
                          </select>
                          </label>
                        </div>
                      </div>
                </div><!--/row-->

                <div class="row">
                     <div class="col-sm-4">
                      <div class="input-group input-group-sm">
                        <input class="form-control" type="text"></input>
                        <span class="input-group-btn">
                         <button class="btn btn-info btn-flat" type="button">GO</button>
                        </span>
                      </div>
                    </div>
                </div>

            <div class="box box-info" style="margin-top:20px">
              <div class="box-body">
                <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Nota SPP
                <small class="pull-right">Tanggal Transaksi: 2/10/2014</small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <address>
                <strong>Aziz Akhmad Wardoyo</strong><br>
                <b>NIS : 30891 </b><br>
                <b>Kelas : XI </b><br>
              </address>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Komponen</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Internet</td>
                    <td>Rp 25.000</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Sumbangan Gedung</td>
                    <td>Rp 35.000</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Wisata</td>
                    <td>Rp 25.000</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="table-responsive" style="margin-left:370px">
                <table class="table">
                  <tbody><tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>Rp 85.000</td>
                  </tr>
                  <tr>
                    <th>Untuk Pembayaran Bulan:</th>
                    <td>
                      <input class="form-control" placeholder=".col-xs-5" type="text">
                    </td>
                  </tr>
                  <tr>
                    <th>Dana Bos :</th>
                    <td><input class="form-control" placeholder=".col-xs-5" type="text"></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>Rp 85.000</td>
                  </tr>
                </tbody></table>
              </div>

         <!--  <div class="row" >
            <div class="col-xs-6">
              
            </div>
          </div> --> 

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section>

              </div><!-- /.box body-->
            </div>
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper
