<?php

namespace App\Controllers\Front;

use App\View\HTML\BootstrapForm;

class Controller
{
    protected $viewpath;
    protected $template;

    protected function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require($this->viewpath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewpath . 'templates/' . $this->template . '.php');

    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('<img src="img/err-403.jpg" style="width: 100%;"><meta http-equiv="refresh" content="4; URL=http://www.lesterresdaris.fr/"/>');
    }
    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('<img src="img/erreur-404.jpg" style="width: 100%;"><meta http-equiv="refresh" content="4; URL=http://www.lesterresdaris.fr/"/>');
    }

}
