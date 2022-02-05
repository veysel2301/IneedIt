<?php
ob_start();
session_start();
require 'baglan.php';
if(isset($_POST['kayit'])){ //veritabanı kayıt 
   $username = $_POST['username'];
   $password = $_POST['password'];
   $password_again =$_POST['password_again'];

    if(!$username){
        echo "Lütfen kullanıcı adınızı giriniz";
    }elseif(!$password || !$password_again){
        echo "Lütfen şifrenizi girin";
    }elseif($password!= $password_again){
        echo "Girdiğiniz şifreler uyuşmamaktadır.Tekrar deneyin";
    }else{
        $sorgu=$db->prepare('INSERT INTO kullanici SET user_name=?,user_password=?');
        $ekle=$sorgu->execute([$username,$password]);
        if($ekle){
        echo "Kayıt başarı ile gerçekleşti,yönlendiriliyorsunuz";
        header('Refresh:2,giris.php');
    }   else{
        echo "Bir hata oluştu .Tekrar kontroledin";
    } }
    
    
}
if(isset($_POST['giris'])){
  $username=$_POST['username'];
  $password = $_POST['password'];
    if(!$username){
        echo "Kullanıcı adınızı giriniz";
    }elseif(!$password){
        echo "Şifrenizi girin";
        
    }else{
        $kullanici_sor=$db->prepare('SELECT *FROM kullanici WHERE user_name=? && user_password =?');
         $kullanici_sor->execute([$username,$password]);
        $say=$kullanici_sor->rowCount(); //saydırma
        if($say==1){//kullanıcı varsa
            $_SESSION['username']=$username;
            
            echo "Başarıyla giriş yaptınız . yönlendiriliyosunuz ..:)";
            header('Refresh:2,index.php');

        }else{
            echo "Bir hata oluştu lütfen tekrar giriş yapın";
        }
  }  
}
?>