<?php

namespace App\Http\View\Composers;

use App\Models\Nationality;
use Illuminate\View\View;

class ClientComposer
{
    public function __construct(Nationality $nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $genderList = config('constants.gender', []);
        $preferedContactMode = config('constants.preffrerd_contact_mode');
        $view->with([
            'genderList' => $genderList,
            'preferedContactMode' => $preferedContactMode,
        ]);
    }
}
