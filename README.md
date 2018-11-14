Yii2 Geocomplete
================

A geocomplete widget for Yii2 using the [Geocomplete jQuery plugin].


Usage
-----

Adding an geocomplete field based on an model attribute:

```
<?= $form->field($model, 'address')
         ->widget(\fv\yii\geocomplete\Widget::class) ?>
```

Yii2 Geocomplete configure the jQuery plugin to look for the
`data-geocomplete` attribute when address lookup is complete. This makes
easy to get other values from the address. For example, to get the country
code and postal code in separate fields, use the following code:

```
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

* `mapsApiKey` - a proper Google Maps API key. *The widget will not work
  if you do not provide a valid API key*. See
  https://developers.google.com/maps/documentation/javascript/get-api-key
  for more details.

* `options` - standard tag attributes

* `container` - jQuery selector of HTML container that Yii2 Geocomplete
  should look for `data-geocomplete`-tagged elements. Default is parent form
  (obtained from Javascript).

* `geocompleteOptions` - object with Geocomplete plugin options. See
  https://ubilabs.github.io/geocomplete/ for a complete list.


Issues
------

Visit: https://github.com/flaviovs/yii2-geocomplete

[Geocomplete jQuery plugin]: https://ubilabs.github.io/geocomplete/
