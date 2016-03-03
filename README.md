### Install

Выполните команду

```
$ php composer.phar require pesto/yii2-variable "*"
```

или добавьте

```
"pesto/yii2-variable": "*"
```

в секцию ```require``` вашего `composer.json` файла.

Выполните миграции
```
./yii migrate/up --migrationPath=@vendor/pesto/yii2-variable/migrations
```


### Configuration

Добавьте следующее в ваш конфигурационный файл:

```php
<?php
...
    'components' => [
      'variable' => [
        'class' => 'pesto\variable\Variable',
      ]
      ...
    ],
...
```

### Usage

Теперь можно в любом месте кода сохранить переменную:

```php
 <?php Yii::$app->variable->set(<name>, <value>) ?>
```
или получить значение уже сохраненной переменной:

```php
 <?php Yii::$app->variable->get(<name>, <default_value>) ?>
```