<?
session_start();
if(!isset($_SESSION['idadmin']) ) {
?>
<script language='javascript'>alert('Anda belum login. Silahkan login dulu');
document.location='adminlogin.php'</script>
<?
}
 else{
 $idadmin = $_SESSION['idadmin'];
  $namaadmin = $_SESSION['namaadmin'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cat Store Jambi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/adminstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<link rel="stylesheet" href="accor.css">
    <script type="text/javascript">

function validate()
{
   if( document.myForm.balasan.value == "" )
   {
     alert( "Balasan Harus Diisi" );
     document.myForm.balasan.focus() ;
     return false;
   }

   return( true );
}
</script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
           <ul>
  <li><a href="adminhome.php">Beranda</a></li>
   <li><a href="adminpassword.php">Password</a></li>
  <li><a href="adminlogout.php">Logout</a></li>
      </ul>
      </div>
      <div class="clr"></div>
      <div class="logo">
        <h1><a href="#">Cat Store Jambi</a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">

        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>Forum</h2>

          <div class="clr"></div>
          <div align="justify">
  <? require("connect.php");
$idforum= $_GET["idforum"];
$query="SELECT * FROM forum WHERE idforum='$idforum'";
$result=mysql_query($query) or die ("Test Invalid query:".mysql_error());
$row =  mysql_fetch_array($result);
        $judul = $row['judul'];
        $isi = $row['isi'];
		 $tglforum = $row['tglforum'];
?>
<table width="333" border="0">
  <tr>
    <td width="105">Judul</td>
    <td width="218">
    : <? echo $judul ?></td>
  </tr>

    <tr>
    <td width="105">Isi</td>
    <td width="218"><label>
    : <? echo $isi ?>
    </label></td>
  </tr>
  <tr>
    <td width="105">Tanggal</td>
    <td width="218"><label>
    : <? echo $tglforum ?>
    </label></td>
  </tr>
</table>
<br/>
<h2>Isi Balasan Forum</h2>

<table summary="Summary Here" cellpadding="0" cellspacing="0">

  <thead>
          <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Balasan</th>
          </tr>
   </thead>

 <?php
	  require ("connect.php");
	  $no =1;
	   $query="select * from detailforum WHERE idforum='$idforum' order by tglbalas asc ";
	  $result=mysql_query($query) or die ("Kesalahan pada perintah SQL!!!!!!");
	  while ($row = mysql_fetch_array($result)) {
	  ?>
	<tbody>
 <tr class="light">
 <td><div align="center"><?php echo $no;?></div></td>
 <td><div align="center"><?php echo $row['tglbalas'];?></div></td>
        <td><div align="center"><?php echo $row['nama'];?></div></td>
        <td><div align="center"><?php echo $row['balasan'];?></div></td>
      </tr>
      </tbody>
	  <?php
	  $no++;
	  }
	  ?>
          </table>
          <br/>
<h2>Balas Forum</h2>

<form action="prosesadminbacaforum.php" method="post" name="myForm" onSubmit="return(validate());">
 <table width="333" border="0">
<tr>
    <td width="105">Balas</td>
    <td width="218"><label>
    <textarea  id="balasan" name="balasan" rows="5" ></textarea>
    </label></td>
  </tr>

<tr>
    <td width="105"></td>
    <td width="218"><label>
   <input name="idforum" type="hidden" id="idforum" value="<?php echo $idforum;?>" />
                    <input name="pembuat" type="hidden" id="pembuat" value="<? echo $namaadmin; ?> (admin)" />
  <input type="submit" name="button" id="button" value="Balas" class="button" />
    </label></td>
  </tr>
   </table>
   </form>
          </div>
          <div class="clr"></div>
        </div>
       </div>


        <div class="sidebar">

       <div id='cssmenu'>
<ul>

      <li class='active has-sub'><a href='#'><span>Data Admin</span></a>
      <ul>
       <li><a href="admininputadmin.php">Input Data Admin</a></li>
     <li><a href="admintabeladmin.php">Tabel Admin</a></li>
      </ul>
   </li>

      <li class='active has-sub'><a href='#'><span>Data Produk</span></a>
      <ul>
      <li><a href="admininputkategori.php">Input Data Kategori</a></li>
             <li><a href="admininputproduk.php">Input Data Produk</a></li>
             <li><a href="admintabelkategori.php">Tabel Kategori</a></li>
             <li><a href="admintabelproduk.php" >Tabel Produk</a></li>

      </ul>
   </li>

     <li class='active has-sub'><a href='#'><span>Ekspedisi</span></a>
      <ul>
         <li><a href="admininputekspedisi.php">Input Data Ekspedisi</a></li>
         <li><a href="admintabelekspedisi.php">Tabel Ekspedisi</a></li>
      </ul>
   </li>
         <li class='active has-sub'><a href='#'><span>Penjualan</span></a>
      <ul>
 <li><a href="admininputpenjualan.php">Input Data Penjualan</a></li>
          <li><a href="admintabelpenjualan.php">Tabel Penjualan</a></li>

      </ul>
   </li>

         <li class='active has-sub'><a href='#'><span>Tabel Data</span></a>
      <ul>
   <li><a href="admintabelpelanggan.php">Tabel Pelanggan</a></li>
            <li><a href="admintabelpemesanan.php">Tabel Pemesanan</a></li>

            <li><a href="admintabelbukutamu.php">Tabel Buku Tamu</a></li>
            <li><a href="admintabelforum.php">Tabel Forum</a></li>
      </ul>
   </li>

</ul>
</div>



      </div>


      <div class="clr"></div>
    </div>
  </div>

      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">

      <p class="rf"><a href="#">Copyright &copy; 2021 Cat Store Jambi</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
