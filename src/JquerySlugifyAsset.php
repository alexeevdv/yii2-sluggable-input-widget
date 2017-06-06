<?php

namespace alexeevdv\widgets;

use yii\web\AssetBundle;

/**
 * Class JquerySlugifyAsset
 * @package alexeevdv\widgets
 */
class JquerySlugifyAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/jquery-slugify/dist';

    /**
     * @inheritdoc
     */
    public $js = [
        'slugify.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
