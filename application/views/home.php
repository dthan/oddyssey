<!-- Sidebar end=============================================== -->
        <div class="span9">     
            <div class="well well-small">
            <h4>Featured Products <small class="pull-right">featured products</small></h4>
            <div class="row-fluid">
            <div id="featured" class="carousel slide">
            <div class="carousel-inner">
              <div class="item active">
              <ul class="thumbnails">
              
                <?php
                foreach ($features as $feature) {
                  ?>
                    <li class="span3">
                  <div class="thumbnail">
                  <i class="tag"></i>
                    <a href="<?= base_url()?>product/<?=$feature->id_produk;?>"><img style="width:160px;height:160px" src="<?= base_url() ?>gambar_produk/<?=$feature->gambar;?>" alt="<?=$feature->nama_produk;?>"></a>
                    <div class="caption">
                      <h5><?=$feature->nama_produk;?></h5>
                      <h4><a class="btn" href="<?= base_url() ?>product/detail/<?=$feature->id_produk;?>-<?=ganti(' ','-',$feature->nama_produk);?>">LIHAT</a> <span class="pull-right"><?=format_rupiah($feature->harga);?></span></h4>
                    </div>
                  </div>
                </li>
                <?php
                }
                ?>
              </ul>
              </div>
              <?php
             /* echo "<pre>";
              print_r($features1);
              echo $count;
              echo "</pre>";*/
              $j=1;
              for ($i=4; $i <=$count ; $i+=4) { 
                  ?>
              <div class="item">
              <ul class="thumbnails">
              <?php
             // $tes = "$features.$j";
              foreach ($featuresnext[$j] as $feature2) {
                ?>
                <li class="span3">
                                <div class="thumbnail">
                                <i class="tag"></i>
                                  <a href="<?= base_url()?>product/<?=$feature2->id_produk;?>"><img style="width:160px;height:160px" src="<?= base_url() ?>gambar_produk/<?=$feature2->gambar;?>" alt="<?=$feature2->nama_produk;?>"></a>
                                  <div class="caption">
                                    <h5><?=$feature2->nama_produk;?></h5>
                                    <h4><a class="btn" href="<?= base_url() ?>product/<?=$feature2->id_produk;?>">LIHAT</a> <span class="pull-right"><?=format_rupiah($feature2->harga);?></span></h4>
                                  </div>
                                </div>
                              </li>
                              <?php

              }
               $j++;

                          ?>
              </ul>
              </div>
                  <?php
              }
              ?>
     

              </div>
              <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#featured" data-slide="next">›</a>
              </div>
              </div>
        </div>
        <h4>Products </h4>
              <ul class="thumbnails">
                <?php
               
                foreach ($products as $product) {
                  if ($product->stok < 1) {
                      $stat = "Habis";
                      $active = "disabled";
                  } else {
                    $stat = "Beli";
                    $active ="";
                  }
                  ?>

                    <li class="span3">
                  <div class="thumbnail">
                    <a  href="<?= base_url()?>product/<?=$feature->id_produk;?>"><img style="width:160px;height:160px" src="<?= base_url() ?>gambar_produk/<?=$product->gambar;?>" alt=""/></a>
                    <div class="caption">
                      <h5><?=$product->nama_produk;?></h5>
                     
                      <h4 style="text-align:center"><a class="btn" href="<?= base_url()?>product/<?=$product->id_produk;?>"> <i class="icon-zoom-in"></i></a> <button class="btn" onclick="add_cart('<?=$product->id_produk;?>','1')" <?=$active;?>><?=$stat;?> </button> <a class="btn btn-primary" href="#"><?=format_rupiah($product->harga);?></a></h4>
                    </div>
                  </div>
                </li>
                  <?php
                }

                ?>
              </ul> 

        </div>
<script type="text/javascript"> 
/*if (typeof jQuery != 'undefined') {
 
    alert("jQuery library is loaded!");
 
}else{
 
    alert("jQuery library is not found!");
 
}*/

      function add_cart(id,qty){ 
      //var isi=$("#kuota_"+id).val();      
      $('#loadnya').show();   
        $.ajax({
          type: "POST",
          url: "keranjang/tambah_barang",
          data: "id=" +id+"&qty="+qty,
          success: function(msg){
            $('#loadnya').hide();  
          if(msg=='true'){
            $.get("<?= base_url() ?>keranjang/count_cart", function(cart){
                  $(".troli_side").html(cart);
                  $(".troli_top").html(cart);
              });
            $.get("<?= base_url() ?>keranjang/price", function(price){
                  $(".price_side").html(price);
                  $(".price_top").html(price);
              });
            } 
          else {
            //$("#input_"+prodix).val(asli);
            alert('Maaf eksekusi Anda gagal');
            } 
          }
        });
      }     
    </script>       
   