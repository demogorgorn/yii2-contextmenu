<?php
/**
 * @package   yii2-contextmenu
 * @author    Oleg Martemjanov <demogorgorn@gmail.com>
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @version   1.6.6
 */
namespace demogorgorn\cxmenu;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;

class ContextMenu extends \yii\base\Widget
{

    /**
     * @var array
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerAssets();
    }

    /**
     * Registers widget assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        ContextMenuAsset::register($view);

        $options = Json::encode($this->options);
        $view->registerJs('$.contextMenu( ' .$options .');');
    }
}