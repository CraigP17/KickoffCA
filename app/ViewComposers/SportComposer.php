<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Sport;

class SportComposer
{
    protected $sports;

    /**
     * Create a new sport composer.
     *
     * @param  Sport  $sports
     * @return void
     */
    public function __construct(Sport $sports)
    {
        // Dependencies automatically resolved by service container...
        $this->sports = $sports;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $minutes = 30;

        $view->with('sports', Cache::remember('sports', $minutes, function() {
            return Sport::all();
        }));

    }
}