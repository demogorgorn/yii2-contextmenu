<?php
/**
 * @package   yii2-context-menu
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @version   1.3.0
 */
namespace demogorgorn\cxmenu;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;
/**
 * A context menu extension for Bootstrap 3.0, which allows you to access
 * a context menu for a specific area on mouse right click.
 * Based on bootstrap-contextmenu jquery plugin by sydcanem.
 *
 * @see https://github.com/sydcanem/bootstrap-contextmenu
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
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