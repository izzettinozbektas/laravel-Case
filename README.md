## Laravel Docker Case

 - Repoyu indir
 - Docker bilgisayarınızda olmalı
 - Proje dizininde  kurulum.sh (./kurulum.sh) çalıştır
 - Çıkan personel client seceneğini enter ile geçebiliriz

> http://localhost:8001 den projeyi çalışır
> 
> http://localhost:8002 den phpmyadmin 
> 
 phpmyadmin giriş bilgileri 
   sunucu `mysql`
   kullanıcı adı `root`
   parola `root` dev isimli db case indir


## Dockersız kullanım
 - Repoyu indir
 - Proje dizinine ;
 - `php artisan migrate`
 - `php artisan db:seed`
 - `php artisan passport:client --personal`
 - `php artisan passport:keys`
 

