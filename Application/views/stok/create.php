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
                        <h3 class="box-title">Yeni Stok İşlemi Oluştur</h3>
                    </div>

                    <form role="form" action="<?=SITE_URL;?>/stok/send" method="post">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="example1">Ürün Seçimi:</label>
                                <select name="urun_id"  class="form-control">
                                    <?php
                                     if(count($params['urunler'])!=0) :
                                            foreach ($params['urunler'] as $key => $value) :
                                     ?>
                                                <option value="<?= $value['id']; ?>"><?= $value['ad']; ?></option>
                                     <?php
                                            endforeach;
                                     else :
                                            echo '<option value="0">Ürün Yok</option>';
                                     endif;
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="example1">Müşteri Seçimi:</label>
                                <select name="musteri_id"  class="form-control">
                                    <option value="0">Müşteri Yok</option>
                                    <?php
                                    if(count($params['musteriler'])!=0) :
                                        foreach ($params['musteriler'] as $key => $value) :
                                    ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['ad']; ?></option>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="example1">İşlem Seçimi:</label>
                                <select name="urun_id"  class="form-control">
                                    <option value="0">Stok Giriş</option>
                                    <option value="1">Stok Çıkış</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="example1">Ürün Adeti:</label>
                                <input type="text" name="adet" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="example1">Ürün Birim Fiyatı:</label>
                                <input type="text" name="fiyat" class="form-control">
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