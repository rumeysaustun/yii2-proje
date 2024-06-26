# Yii2 ile Hastane Widget Projesi
*Rumeysa ÜSTÜN   190202011* <br>
*Büşra Nur BAYSA 190202091*


Bu modül, hastane sitesi için birkaç widget sağlar. Bu projede, doktor ve hastayı birbirine bağlayan formlu tek bir widget vardır.

Kurulumlar
--------------------------------

Sırasıyla aşağıdaki yazılımlar kurulmalıdır.<br>
1.[Virtualbox](https://www.virtualbox.org/wiki/Downloads)<br>
2.[XAMPP](https://www.apachefriends.org/tr/download.html)(7.3.26 sürümü kullanılmıştır.)<br>
3.[Git](https://www.git-scm.com/)<br>
4.[GitHub API token](https://github.com/settings/tokens) Generate new token'a tıklayarak yeni bir token oluşturulmalıdır.<br>
5.[Composer](https://getcomposer.org/)<br>
6.Composer'ı ve XAMPP'ı çalıştırdıktan sonra yönetici yetkileriyle terminal (komut satırı) açılarak aşağıdaki direktifler uygulanmalıdır. Yii2 şu komut ile kurulmalıdır:
```
composer.phar create-project yiisoft/yii2-app-advanced advanced2
```
7.Aşağıdaki kod ile proje init edilmelidir. Development seçeneği ile ilerlenir.
```
init
```
8.Packagist'ten proje aşağıdaki komutla çekilir.
```
composer require rumeysaustun/yii2-hospital "dev-main"
```
9.Aşağıdaki kod çalıştırılmalıdır.
```
yii migrate/up
```
10.Veritabanı işlemlerini yapabilmek için aşağıdaki kod girilmelidir.
```
php yii migrate/up --migrationPath=vendor/rumeysaustun/yii2-hospital/migrations
```
11.Ve bunu backend/config/main.php'deki modules bölümüne ekleyin:

```
    'hospital' => [
        'class' => 'rumeysaustun\hospital\Module',
        'adminRoles' => ['@'],
    ],
```
Çalıştırma
--------------------------------
Aşağıdaki url'yi tarayıcınızın arama kısmına giriniz.
```
localhost/advanced2/backend/web/index.php?r=hospital/doctor/index
```
Resimler
---------------------------------
Yeni hasta kaydı:
<a href="https://resimlink.com/OEd2" title="ResimLink - Resim Yükle"><img src="https://r.resimlink.com/OEd2.png" title="ResimLink - Resim Yükle" alt="ResimLink - Resim Yükle"></a>
Hasta listesi:
<a href="https://resimlink.com/jxdZ1Ga" title="ResimLink - Resim Yükle"><img src="https://r.resimlink.com/jxdZ1Ga.png" title="ResimLink - Resim Yükle" alt="ResimLink - Resim Yükle"></a>
Hasta listesinde arama yapmak:
<a href="https://resimlink.com/gBcvEum" title="ResimLink - Resim Yükle"><img src="https://r.resimlink.com/gBcvEum.png" title="ResimLink - Resim Yükle" alt="ResimLink - Resim Yükle"></a>
Doktor ekleme:
<a href="https://resimlink.com/ifo9" title="ResimLink - Resim Yükle"><img src="https://r.resimlink.com/ifo9.png" title="ResimLink - Resim Yükle" alt="ResimLink - Resim Yükle"></a>
İşlem yapma:
<a href="https://resimlink.com/OcwY" title="ResimLink - Resim Yükle"><img src="https://r.resimlink.com/OcwY.png" title="ResimLink - Resim Yükle" alt="ResimLink - Resim Yükle"></a>
İşlem listesi:
<a href="https://resimlink.com/5Lh0F" title="ResimLink - Resim Yükle"><img src="https://r.resimlink.com/5Lh0F.png" title="ResimLink - Resim Yükle" alt="ResimLink - Resim Yükle"></a>

Ekler
---------------------------------
'@' olarak ayarlanırsa, yalnızca oturum açmış kullanıcılar bu modülü kullanabilir;

'?' olarak ayarlanırsa yalnızca oturum açmamış kullanıcılar bu modülü kullanabilir;

'*' olarak ayarlanırsa herkes bu modülü kullanabilir;

veya rolleri array olarak ayarlayabilirsiniz => ['superadmin', 'administrator', 'admin']

Rotalar
---------------------------------

Doktor Listesi: / hospital / doctor / index

Yeni Doktor: / hospital / doctor / form

Hasta Listesi: / hospital / patient / index

Yeni Hasta: / hospital / patient / form

Hastayı Güncelle (hasta kimliği kullanın): / hospital / patient / güncelleme(update)? id = 1

Hasta Eylemi (hasta kimliği kullanın): / hospital / patient / eylem(action) / görünüm(view)? id = 1

Eylem Listesi(Actions List): / hospital / eylem(action) / index

Widget'lar
---------------------------------

Doktor formu widget'ını kullanabilirsiniz:

```
<? = rumeysaustun \ hospital \ widgets \ DoctorForm :: widget (['pjax' => true]); ?>
```


Hasta formu widget'ını kullanabilirsiniz:

```
<? = rumeysaustun \ hospital \ widgets \ PatientForm :: widget (['pjax' => true]); ?>
```

Eylem (action) formu widget'ını kullanabilirsiniz (hasta modelini parametrelere göndermeniz gerekir):

```
<? = rumeysaustun \ hospital \ widgets \ ActionForm :: widget ([
    'pjax' => true,
    'patient' => rumeysaustun \ hospital \ models \ PatientForm :: findOne (1),
]); ?>
```
