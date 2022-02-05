<?php

require "rsmbaglan.php";
$aciklama=$_POST["aciklama"];
$dosya_adi=$_FILES["resim"]["name"];
$dosya_adi1=$_FILES["resim1"]["name"];
$dosya_adi2=$_FILES["resim2"]["name"];
$dosya_adi3=$_FILES["resim3"]["name"];
$yeni_ad="resimler/".$dosya_adi;
$yeni_ad1="resimler1/".$dosya_adi1;
$yeni_ad2="resimler2/".$dosya_adi2;
$yeni_ad3="resimler3/".$dosya_adi3;

if(move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad) ){
    echo "<script>alert('İlanınınz başarılı bir şekilde yüklendi.Anasayfaya yönlendiriliyorsunuz')</script>";
     if(move_uploaded_file($_FILES["resim1"]["tmp_name"],$yeni_ad1)){
    }
  if(move_uploaded_file($_FILES["resim2"]["tmp_name"],$yeni_ad2)){
         
    }
    if(move_uploaded_file($_FILES["resim3"]["tmp_name"],$yeni_ad3)){
        
    }
    $sorgu=("INSERT INTO foto(resim,resim1,resim2,resim3,aciklama) VALUES ('".$dosya_adi."','".$dosya_adi1."','".$dosya_adi2."','".$dosya_adi3."','.$aciklama')");
    //if($sorgu){ echo "Veritabanına kaydedildi";}
    
//else{
    //echo "dosya yüklenemedi";
//}
if($baglan->query($sorgu)===TRUE){
        //echo "<script>alert('İlanınız Gönderilmiştir.') </script>";
    header('Refresh:1,index.php');
    }
    else{
        echo "<script>alert('İlanınız gönderilirken  bir hata oluştu. </script>";
    }


}


?>