Kurulum Rehberi
Proje laravel herd kullanılarak yapılmıştır Herd kurulumu yapıldıktan sonra Herd klasörü altında çalışır ve url olarak klasor_adi.test URL inde çalıştırılır. Proje adı kroppa-mervecelik olarak ayarlanmıştır.
- Projenin Kopyalanması

Projeyi GitHub veya bir başka platformdan çekmek için:

git clone <proje-repository-URL>
cd kroppa-mervecelik

- Veritabanı Migrasyonları ve Seed Komutları

Veritabanı tablolarını oluşturmak ve gerekli test verilerini eklemek için:

php artisan migrate

- Uygulama Anahtarını Oluşturma

php artisan key:generate

- Geliştirme Sunucusunu Başlatma

API Testi

Postman koleksiyonu ile API’nin çalıştığını test edin.

- Postman Koleksiyonu Kullanımı

Postman’i açın.

Import seçeneğine tıklayın.

Kroppa MerveCelik.postman_collection.json dosyasını içeri aktarın.

API isteklerini çalıştırın:

POST /start-game

POST /end-game

GET /top-ten

- Test Sonuçları

Doğru çıktıları aldığınızı kontrol edin:

Start Game: Kullanıcı ve oyun ID’sini döner.

End Game: Kullanıcının günlük sıralaması ve en iyi skorunu döner.

Daily Top 10: Günün en iyi 10 oyuncusunun bilgilerini ve skorlarını döner.
