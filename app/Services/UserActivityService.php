<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\Factory;

class UserActivityService
{
    protected $view;
    public function __construct(Factory $view)
    {
        $this->view = $view;
    }


    public function generate()
    {
        $users = User::where('last_login', '>', Carbon::now()->subDays(3))->take(3)->get();
        $html = $this->view->make('centaur.include.partial.user.activity', ['users' => $users])->render();
        return $html;
    }
}
