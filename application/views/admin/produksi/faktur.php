<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>pesanan</title>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/admin/css/faktur.css" />
</head>
<body>

<div style="page-break-after: always;">
  <h1 style="text-align:center">Faktur Pengiriman ke maklun</h1>
  <?php
  foreach ($produksi as $key) {
  ?>

  <table class="store">
    <tr>
      <td>Tas Odyssey Bandung<br />
       Bumi Panyawangan Cileunyi Bandung<br />
       telp toko<br />
        
       <br />
       www.tasodysseybandung.com</td>
      <td align="right" valign="top"><table>
          <tr>
            <td><b>no faktur : </b></td>
            <td><?= $key->id_produksi ?></td>
          </tr>
         
          <tr>
            <td><b>Tanggal Pengiriman : </b></td>
            <td>tanggal</td>
          </tr>
     
        
        </table></td>
    </tr>
  </table>
  <table class="address">
    <tr class="heading">
      <td width="50%"><b>Penerima</b></td>
      
    </tr>
    <tr>
      <td><?= "Nama barang : <b>".$key->nama_barang."</b><br/>Nama Maklun<b> : ".$key->nama_maklun."</b></br>alamat : ".$key->alamat ?></td>     
  
      
    </tr>
  </table>
  <b>jumlah produksi : <?=  $key->jumlah_produksi ?></b><br/><br/>
  <table class="product">
    <tr class="heading">
      <td><b>Nama Atribut</b></td>
      <td align="right"><b>kuantitas</b></td>
      <td align="right"><b>harga</b></td>
      <td align="right"><b>total</b></td>
    </tr>
   <?php
   $total=0;
   foreach ($atribut as $k) {

     $jumlah = (($k->harga)*($k->jumlah));
     ?>
      <tr>
      <td><?= $k->nama_atribut; ?></td>
      <td><?= $k->jumlah; ?></td>
      <td align="right"><?= format_rupiah($k->harga) ?></td>
      <td align="right"><?= format_rupiah($jumlah) ?></td>
    </tr>
     <?php
     $total=$total+$jumlah;
   }
   $total2=$total*($key->jumlah_produksi);
   ?>
   

   
    

     <tr>
      <td align="right" colspan="3"><b>sub total </b></td>
      <td align="right"><?= format_rupiah($total) ?></td>
    </tr>
    <tr>
      <td align="right" colspan="3"><b>total harga (<?= format_rupiah($total) ?> x <?= $key->jumlah_produksi ?>) </b></td>
      
      <td align="right"><b><?= format_rupiah($total2) ?></b></td>
    </tr>
   

  </table>
 
 
 <?php  
  }
  ?>
</div>

</body>
</html>