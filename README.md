# yii2-proje
Rumeysa ÜSTÜN   190202011 <br>
Büşra Nur BAYSA 190202091


Yii2-hastane
==========

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


# Yii2-Hastane Projesi

**Rumeysa ÜSTÜN 190202011**  
**Büşra Nur BAYSA 190202091**

## Proje Tanıtımı

Bu modül, bir hastane sitesi için çeşitli widget'lar sağlar. Projede, doktor ve hastayı birbirine bağlayan formlu bir widget bulunmaktadır.

---

## Kurulumlar

### 1. Gereken Yazılımlar

Sırasıyla aşağıdaki yazılımlar kurulmalıdır:

1. [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
2. [XAMPP](https://www.apachefriends.org/tr/download.html) (7.3.26 sürümü kullanılmıştır.)
3. [Git](https://www.git-scm.com/)
4. [GitHub API token](https://github.com/settings/tokens) - "Generate new token" seçeneği ile yeni bir token oluşturulmalıdır.
5. [Composer](https://getcomposer.org/)

### 2. Kurulum Adımları

1. Composer'ı ve XAMPP'ı çalıştırdıktan sonra, yönetici yetkileriyle terminal (komut satırı) açılarak aşağıdaki komut uygulanmalıdır. Yii2 şu komut ile kurulmalıdır:
    ```sh
    composer.phar create-project yiisoft/yii2-app-advanced advanced2
    ```

2. Aşağıdaki komut ile proje başlatılmalıdır. Development seçeneği ile ilerlenir.
    ```sh
    init
    ```

3. Packagist'ten proje aşağıdaki komutla çekilir.
    ```sh
    composer require rumeysaustun/yii2-hospital "dev-main"
    ```

4. Aşağıdaki komut çalıştırılmalıdır.
    ```sh
    yii migrate/up
    ```

5. Veritabanı işlemlerini yapabilmek için aşağıdaki komut girilmelidir.
    ```sh
    php yii migrate/up --migrationPath=vendor/rumeysaustun/yii2-hospital/migrations
    ```

6. Backend yapılandırmasına modül eklenmelidir. `backend/config/main.php` dosyasındaki `modules` bölümüne ekleyin:
    ```php
    'hospital' => [
        'class' => 'rumeysaustun\hospital\Module',
        'adminRoles' => ['@'],
    ],
    ```

---

## Çalıştırma

Aşağıdaki URL'yi tarayıcınızın adres çubuğuna giriniz:
localhost/advanced2/backend/web/index.php?r=hospital/doctor/index

yaml
Kodu kopyala

---

## Görseller

### Yeni Hasta Kaydı:
[![Yeni Hasta Kaydı](https://r.resimlink.com/OEd2.png)](https://resimlink.com/OEd2)

### Hasta Listesi:
[![Hasta Listesi](https://r.resimlink.com/jxdZ1Ga.png)](https://resimlink.com/jxdZ1Ga)

### Hasta Listesinde Arama Yapmak:
[![Hasta Listesinde Arama Yapmak](https://r.resimlink.com/gBcvEum.png)](https://resimlink.com/gBcvEum)

### Doktor Ekleme:
[![Doktor Ekleme](https://r.resimlink.com/ifo9.png)](https://resimlink.com/ifo9)

### İşlem Yapma:
[![İşlem Yapma](https://r.resimlink.com/OcwY.png)](https://resimlink.com/OcwY)

### İşlem Listesi:
[![İşlem Listesi](https://r.resimlink.com/5Lh0F.png)](https://resimlink.com/5Lh0F)

---

## Ekler

- `'@'` olarak ayarlanırsa, yalnızca oturum açmış kullanıcılar bu modülü kullanabilir.
- `'?'` olarak ayarlanırsa yalnızca oturum açmamış kullanıcılar bu modülü kullanabilir.
- `'*'` olarak ayarlanırsa herkes bu modülü kullanabilir.
- Rolleri array olarak ayarlayabilirsiniz => `['superadmin', 'administrator', 'admin']`

---

## Rotalar

- **Doktor Listesi:** `/hospital/doctor/index`
- **Yeni Doktor:** `/hospital/doctor/form`
- **Hasta Listesi:** `/hospital/patient/index`
- **Yeni Hasta:** `/hospital/patient/form`
- **Hastayı Güncelle:** `/hospital/patient/update?id=1` (hasta kimliği kullanın)
- **Hasta Eylemi:** `/hospital/patient/action/view?id=1` (hasta kimliği kullanın)
- **Eylem Listesi:** `/hospital/action/index`

---

## Widget'lar

### Doktor Formu Widget'ı

```php
<?= rumeysaustun\hospital\widgets\DoctorForm::widget(['pjax' => true]); ?>
Hasta Formu Widget'ı
php
Kodu kopyala
<?= rumeysaustun\hospital\widgets\PatientForm::widget(['pjax' => true]); ?>
Eylem Formu Widget'ı
php
Kodu kopyala
<?= rumeysaustun\hospital\widgets\ActionForm::widget([
    'pjax' => true,
    'patient' => rumeysaustun\hospital\models\PatientForm::findOne(1),
]); ?>
