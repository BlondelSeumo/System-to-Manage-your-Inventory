<?php namespace app\Util\Contracts\ViewComposer;

use Illuminate\View\View;

interface ComposerInterface
{

    /**
     * Compose the View
     *
     * @param View $view
     *
     * @return mixed
     */
    public function compose(View $view);

}