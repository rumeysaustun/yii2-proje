# yii2-proje
Rumeysa ÜSTÜN   190202011
Büşra Nur BAYSA 190202091


Yii2-hastane
==========

Bu modül, hastane sitesi için birkaç widget sağlar. Bu projede, doktor ve hastayı birbirine bağlayan formlu tek bir widget vardır.

Kurulumlar
--------------------------------

Sırasıyla aşağıdaki yazılımlar kurulmalı ve github token üretilmelidir.<br>
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
![alt Yeni hasta kaydı:](https://r.resimlink.com/OEd2.png)

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
