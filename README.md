yii2-cms
=========

Yii2 cms module will help to add multiple pages, menu areas and menu items. Under a menu area multiple menu's can be added by a drag and drop way to make the process much easy.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist caritor/yii2-cms "@dev"
```

or add

```
"cms/yii2-cms": "@dev"
```

to the require section of your `composer.json` file.

Apply migration
---------------

```sh
yii migrate --migrationPath=vendor/caritor/yii2-cms/migrations
```

Configuration:
--------------

```php
'modules' => [
    'cms' => [
        'class' => 'caritor\cms\Module'
    ],
],
```

Widget To Pull Menu items:
--------------------------

```php
use caritor\cms\widgets\CmsmenuWidget;
CmsmenuWidget::widget(['area_code' => '{{area_code}}']);
```

Routing:
--------

Pages - ```php ?r=cms/pages```
Menu Areas - ```php ?r=cms/menuarea```
Menus - ```php ?r=cms/menu/selectarea```