# CRM (Customer Relationship Management) - OOP


### Veritabanı Adı: crm
------------------
### Kullanıcı Adı: admin
### Şifre: 123456
------------------
## Dosya açıklamaları:

1- **index.php** : admin giriş ekranına giriyoruz. Bilgiler karşılaştırılıp session başlatılıyor.

2- **fonksiyonlar.php** : class ve metotlar, yapılacak işlemler ve fonksiyonlar buradan çekiliyor.

3- **kayitlar.php** : veritabanındaki bilgiler burada class içinde tanımlanıyor.

4- **tablolar.php** : müşteri şirket kayıtları listeleniyor. Kayıtlar arasında arama yapabilir, kayıt düzenleyip silebilirsiniz.

5- **musteri-formu.php** : müşteri kaydetme formu.

6- **musteri-ekle.php** : müşteri ve şirket logosu kayıt işlemleri yapılıyor.

7- **duzenle.php** : seçilen müşteri id'sine göre forma müşteri verilerini veritabanından çekiyor, düzenleme yapmamıza izin veriyor. Değiştirilen resim de dosyalardan siliniyor.

8- **sil.php** : kayıt silmemizi sağlıyor.

7- **csv.php** : tablo sayfamızdaki csv butonuyla kayıtları CSV formatında indiriyor.

8- **logo.php** : yazılımın kendi logosunu da değiştirilebilir yaptım.

9- **upload.php** : yazılımın logosunun değiştirilme işlemleri burada yapılıyor.

10- **cikis.php** : session destroy ediliyor, giriş sayfasına yönlendiriliyor.

**Not:** Html head ve footer kısımları partials dosyasından include ediliyor.

**Not2:** Eklenen logolar uploads klasöründe tutuluyor.


