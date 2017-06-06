Installation
===

Preferred way to install this extension is via composer:

```bash
composer require alexeevdv/yii2-sluggable-input-widget 1.0.0
```

Usage
===

```php
<?php

use alexeevdv\widget\SluggableInputWidget;

// ...

echo $form
    ->field($model, 'title');

echo $form
    ->field($model, 'slug')
    ->widget(SluggableInputWidget::className(), [
        'dependsOn' => 'title',    
    ]);

// ...

```
