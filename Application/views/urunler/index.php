<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ürün Listesi</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Ad</th>
                                <th>Düzenle</th>
                                <th>Kaldır</th>
                            </tr>

                            <?php
                            if (count($params['data'])!=0) :
                                foreach ($params['data'] as $key => $value) : ?>

                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['ad'];?></td>
                                        <td><a href="<?=SITE_URL;?>/urunler/edit/<?=$value['id'];?>">Düzenle</a></td>
                                        <td><a href="<?=SITE_URL;?>/urunler/delete/<?=$value['id'];?>">Sil</a></td>
                                    </tr>
                                <?php
                                endforeach;
                            endif;
                            ?>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>