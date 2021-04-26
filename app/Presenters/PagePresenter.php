<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class PagePresenter extends Presenter
{
    public function paddedTitle() {
        $padding = str_repeat('_', $this->depth * 2 );

        return $padding . $this->title;
    }
}