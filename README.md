# yii2-proje
Rumeysa ÜSTÜN   190202011
Büşra Nur BAYSA 190202091


Yii2-hastane
==========

Bu modül, hastane sitesi için birkaç widget sağlar. Bu projede, doktor ve hastayı birbirine bağlayan formlu tek bir widget vardır.

Kurulum (Installation)
---------------------------------

Proje kök klasöründe çalıştırın:

```
php composer rumeysaustun / yii2-hospital "@dev" gerektirir
```

```
php yii migrate / up --migrationPath = vendor / rumeysaustun / yii2-hospital / migrations
```

Yapılandırma (Config)
---------------------------------

Ve bunu config'in modüller bölümüne ekleyin:

```
    'hospital' => [
        'class' => 'rumeysaustun\hospital\Module',
        'adminRoles' => ['@'],
    ],
```

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
