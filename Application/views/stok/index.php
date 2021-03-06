<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stok İşlemleri Listesi</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Ürün Adı</th>
                                <th>İşlem Tipi</th>
                                <th>Toplam Fiyat</th>
                                <th>Düzenle</th>
                                <th>Kaldır</th>
                            </tr>

                            <?php
                            if (count($params['data'])!=0) :
                                    foreach ($params['data'] as $key => $value) :
                                        $urunler = $this->model('urunlerModel')->getData($value['id']);
                                            if ($value['islem_tipi'] == 0) :
                                                $islem = "Stok Giriş";
                                                $toplamfiyat = "-".$value['adet']*$value['fiyat'];
                                            else :
                                                $islem = "Stok Çıkış";
                                                $toplamfiyat = $value['adet']*$value['fiyat'];
                                            endif;
                            ?>

                                        <tr>
                                            <td><?=$value['id'];?></td>
                                            <td><?=$urunler['ad'];?></td>
                                            <td><?=$islem;?></td>
                                            <td><?=$toplamfiyat;?></td>
                                            <td><a href="<?=SITE_URL;?>/stok/edit/<?=$value['id'];?>">Düzenle</a></td>
                                            <td><a href="<?=SITE_URL;?>/stok/delete/<?=$value['id'];?>">Sil</a></td>
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