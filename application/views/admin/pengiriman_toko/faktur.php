<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>pesanan</title>

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/admin/css/faktur.css" />
</head>
<body>

<div style="page-break-after: always;">
  <h1 style="text-align:center">Faktur Pengiriman Toko</h1>
  <?php
  foreach ($pesanan as $key) {
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
            <td><?= $key->kode_pengiriman ?></td>
          </tr>
         
          <tr>
            <td><b>Tanggal Pengiriman : </b></td>
            <td><?= $this->tanggal->tgl_indo($key->tgl_pengiriman) ?></td>
          </tr>
     
        
        </table></td>
    </tr>
  </table>
  <table class="address">
    <tr class="heading">
      <td width="50%"><b>Alamat Penerima</b></td>
      <td width="50%"><b>Alamat Penerima(jika beda)</b></td>
    </tr>
    <tr>
      <td><?= "<label>Yth</label> : <b>".$key->pemilik."</b></br><label>Nama Toko</label> : ".$key->nama_toko."</br>alamat : ".$key->alamat_penerima ?></td>     
  
      <td></td>
    </tr>
  </table>
  <table class="product">
    <tr class="heading">
      <td><b>Nama produk</b></td>
      <td align="right"><b>kuantitas</b></td>
      <td align="right"><b>harga</b></td>
      <td align="right"><b>total</b></td>
    </tr>
   <?php
   $total=0;
   foreach ($detail as $k) {

     $jumlah = (($k->harga)*($k->jumlah));
     ?>
      <tr>
      <td><?= $k->nama_produk; ?></td>
      <td><?= $k->jumlah; ?></td>
      <td align="right"> <?= format_rupiah($k->harga) ?></td>
      <td align="right"> <?= format_rupiah($jumlah) ?></td>
    </tr>
     <?php
     $total=$total+$jumlah;
   }
   ?>
   

   
    


    <tr>
      <td align="right" colspan="3"><b>total harga:</b></td>
      <td align="right"> <?= format_rupiah($total) ?></td>
    </tr>

  </table>
 
  <table class="comment">
    <tr class="heading">
      <td><b>jasa pengiriman</b></td>
    </tr>
    <tr>
      <td><?= $key->kurir ?></td>
    </tr>
  </table>
 <?php  
  }
  ?>
</div>

</body>
</html>