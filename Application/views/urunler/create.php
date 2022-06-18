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
                        <h3 class="box-title">Yeni Ürün Oluştur</h3>
                    </div>

                    <form role="form" action="<?=SITE_URL;?>/urunler/send" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ürün Adı:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="ad">
                            </div>

                            <div class="form-group">
                                <label for="">Ürün Kategorisi</label>
                                <select name="kategoriId" id="" class="form-control">
                                    <?php foreach ($params['category'] as $key => $value) : ?>
                                        <option value="<?=$value['id'];?>"><?=$value['ad'];?></option>
                                        <?php endforeach; ?>
                                </select>
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