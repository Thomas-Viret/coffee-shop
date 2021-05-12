<?php

class ErrorController
{
    public function show($view, $viewVars = [])
    {
        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $view . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }

    public function notFound()
    {
        $this->show('404');
    }

}