# Ödev Tanımı: 
Bir formdan gelen Ad Soyad ve TC Kimlik numarası verisini veritabanına kaydeden bir uygulama hazırla.
Veritabanına kayıt etmeden önce TC Kimlik numarasını aşağıdaki kurallara göre bir Class içerisinde
doğrula ve sonucu da diğer bilgilerle birlikte veritabanına kaydet.

(1) TC kimlik numaraları 11 hanelidir ve her hanesi rakamsal değerdedir.

(2) İlk hane hiçbir zaman 0 olamaz.

(3) TC kimlik numaralarının ilk 10 hanesi aynı ve son hanesi 0 olamaz. Ör: 11111111110, 22222222220...

(4) 1. 3. 5. 7. ve 9. hanelerin toplamının 7 ile çarpımından, 2. 4. 6. ve 8. hanelerin toplamı çıkartıldığında

geriye kalan sayının 10ʹa göre modu 10. haneye eşittir.

(5) 1. 2. 3. 4. 5. 6. 7. 8. 9. 10. hanelerin toplamının 10ʹa göre modu 11. haneye eşittir.


# Ödev Açıklaması: 

Veritabanı bağlantısı, veri ekleme, veri gösterme kısımları fonksiyonlar.php içerisindedir. T.C Kimlik No kontrolleri kayitlar.php'de yapılmaktadır.

1) index.php içerisindeki form ile Ad-Soyad ve TC Kimlik Numarası post edilerek ekle.php'ye gönderilir.

2) ekle.php içerisine kontrollerin yapıldığı kayitlar.php çekilir.

3) Eğer form post edilmişse T.C Kimlik Numarası uygunluk durumuna göre sınanıp değerlendirilir ve veritabanına kayıt edilir.

	![Anasayfa](https://user-images.githubusercontent.com/82964908/203845110-f056d036-3a7a-48ec-9e50-00aa51051d5e.jpg)
	![tablo](https://user-images.githubusercontent.com/82964908/203845121-1050f15e-4ac2-4ae2-ac70-8aafc00c239b.jpg)
