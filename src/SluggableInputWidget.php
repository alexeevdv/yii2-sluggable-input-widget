<?php

namespace alexeevdv\widget;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Class SluggableInputWidget
 * @package alexeevdv\widgets
 */
class SluggableInputWidget extends InputWidget
{
    /**
     * Name of model attribute this widget depends on.
     * It can be id of html element if starts from #
     * @var string
     */
    public $dependsOn;

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if (!$this->dependsOn) {
            throw new InvalidConfigException('`dependsOn` param is required.');
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        SpeakingUrlAsset::register($this->getView());

        $options = ArrayHelper::merge([
            'id' => $this->getId(),
            'class' => 'form-control',
        ], $this->options);
        $selector = $this->getSelector();
        $this->getView()->registerJs("
            $('$selector').change(function (event) {
                var value = $(this).val();
                $('#{$options['id']}').val(window.getSlug(value));
            });
        ");

        if ($this->model) {
            return Html::activeTextInput($this->model, $this->attribute, $options);
        } else {
            return Html::textInput($this->name, $this->value, $options);
        }
    }

    /**
     * @return string
     * @throws InvalidConfigException
     */
    private function getSelector()
    {
        if (strpos($this->dependsOn, '#') === 0) {
            return $this->dependsOn;
        }

        if ($this->model && $this->model->hasProperty($this->dependsOn)) {
            return '#' . Html::getInputId($this->model, $this->dependsOn);
        }
        throw new InvalidConfigException('Unknown `dependsOn` param: ' . $this->dependsOn);
    }
}
