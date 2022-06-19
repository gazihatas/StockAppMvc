<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['statu'])) :
                    echo $_SESSION['statu'];
                endif;
                ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Yeni Müşteri Oluştur</h3>
                    </div>

                    <form role="form" action="<?=SITE_URL;?>/musteriler/send" method="post">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Adı:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="ad">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Soyadı:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="soyad">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Şirket:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="sirket">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefon:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="telefon">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Adres:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="adres">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tc:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="tc">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Not:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="notu">
                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>