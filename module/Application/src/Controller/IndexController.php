<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Barcode\Barcode;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function aboutAction()
    {
        return new ViewModel([
            'appName' => 'Test App',
            'appDescription' => 'Test Description'
        ]);
    }

    public function barcodeAction()
    {
        // Получаем параметры от маршрута.
        $type = $this->params()->fromRoute('type', 'code39');
        $label = $this->params()->fromRoute('label', 'HELLO-WORLD');

        // Устанавливаем опции штрих-кода.
        $barcodeOptions = ['text' => $label];
        $rendererOptions = [];

        // Создаем объект штрих-кода.
        $barcode = Barcode::factory($type, 'image',
            $barcodeOptions, $rendererOptions);

        // Строка ниже выведет изображение штрих-кода в
        // стандартный поток вывода.
        $barcode->render();

        // Возвращаем объект Response, чтобы отключить визуализацию стандартного представления.
        return $this->getResponse();
    }
}
