<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter
{
    public function paddingTitle() {
        $padding = str_repeat('-', $this->depth * 4 );

        return $padding. $this->title;
    }
}