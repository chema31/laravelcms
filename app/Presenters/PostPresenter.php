<?php
namespace App\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class PostPresenter extends Presenter
{
    public function formattedPublishedDate() {
        return Carbon::parse($this->published_at)->format('d/m/Y H:i:s');
    }
}