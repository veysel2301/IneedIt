<?php
include('rsmbaglan.php');
$sec="Select*From iletisim";
$sonuc=$baglan->query($sec);

if($sonuc->num_rows>0){ 
    while($cek=$sonuc->fetch_assoc()){ 
       echo " 
      
       
    <tr>
    <td>".$cek['rsm']." </td>
    <td>".$cek['txt']."</td>
    </tr>
       "; 
    }
    
}
    else{
        echo "Veri Tabanında kayıtlı hiçbir veri bulunamamıştır.";
    }

    


?>
<html>

 <head>
        <meta charset="utf-8">
       <script src="https://kit.fontawesome.com/76c8115894.js" crossorigin="anonymous"></script>
        <title>Anasayfa | I NEED IT</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">

    </head>
    
    <body>
    <section id="ilanekle">
                   <h3 id="h3ilanekleme">İlan Ekleme</h3>
               <p class="ilanyazi"> <i class="fas fa-exclamation-triangle"></i>İlan Göndermek için resmi yükleyin.Yönetici onayından sonra ilanınız siteye yüklenecektir.</p>
      <form action="rsm.php" method="post" enctype="multipart/form-data"><input type="file" name="resim">
                <input type="text" name="text">
                 Resmi Yükle:
                 <input type="submit" value="yükle">
            
        
        
        
        </form></section>
    
    </body>
</html>