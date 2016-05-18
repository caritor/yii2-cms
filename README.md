yii2-cms
=========

Yii2 cms module will help to add multiple pages, menu areas and menu items. This a kind of wordpress way of managing pages and menu items, i.e, once enough pages and menu items has been built, using a drag and drop feature pages can be used to create a menu tree with multiple menu levels.

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

Url Routing:
--------

Pages - 
```php 
	?r=cms/pages
```
Menu Areas - 
```php 
	?r=cms/menuarea
```
Menus - 
```php 
	?r=cms/menu/selectarea
```