<?php

namespace alexeevdv\widget;

use yii\web\AssetBundle;

/**
 * Class JquerySlugifyAsset
 * @package alexeevdv\widgets
 */
class SpeakingUrlAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/speakingurl/lib';

    /**
     * @inheritdoc
     */
    public $js = [
        'speakingurl.js'
    ];
}
