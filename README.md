Yii2 Geocomplete
================

A geocomplete widget for Yii2 using the [Geocomplete jQuery plugin].


Usage
-----

First you need to configure Google Maps API key, This can be done by
setting the `mapsApiKey` property in the widget's asset bundle in your
app config:

```php
'components' => [
    'assetManager' => [
        'bundles' => [
            fv\yii\geocomplete::class => [
                'mapsApiKey' => 'YOUR-API-KEY',
			]
		]
	]
];
```

**Notice** *The widget will not work properly unless you provide a
valid API key*. See
https://developers.google.com/maps/documentation/javascript/get-api-key
for more details.

Then you can add geocomplete widgets to your models fields in your
views:

```php
<?= $form->field($model, 'address')
         ->widget(\fv\yii\geocomplete\Widget::class) ?>
```

Yii2 Geocomplete configure the jQuery plugin to look for the
`data-geocomplete` attribute when address lookup is complete. This
makes easy to get other values from the address. For example, to get
the country code and postal code in separate fields, use the following
code:

```php
<?= $form->field($model, 'address')
     ->widget(\fv\yii\geocomplete\Widget::class) ?>

<?= $form->field($model,
                 'postal_code', [
                     'inputOptions' => [
                         'data-geocomplete' => 'postal_code',
                     ],
                 ]) ?>

<?= $form->field($model,
                 'country_code', [
    	             'inputOptions' => [
                         'data-geocomplete' => 'country_short',
                     ],
                 ]) ?>
```


Widget Options
--------------

Yii2 Geocomplete widgets accept the following options:

* `options` - standard tag attributes

* `container` - jQuery selector of HTML container that Yii2
  Geocomplete should look for `data-geocomplete`-tagged
  elements. Default is the parent form (obtained from Javascript).

* `geocompleteOptions` - object with Geocomplete plugin options. See
  https://ubilabs.github.io/geocomplete/ for a complete list.


Issues
------

Visit: https://github.com/flaviovs/yii2-geocomplete

[Geocomplete jQuery plugin]: https://ubilabs.github.io/geocomplete/
