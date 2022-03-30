<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Activity extends BaseController
{

    protected $activity;

    public function __construct()
    {
        $this->activity = new \App\Models\AktivitasModel();
    }
    
    public function index()
    {
        return view('activity', [
            'title'   => 'Activity',
            'segment' => $this->request->uri->getSegments(),
            'activity' => $this->activity->findAll(),
        ]);
    }
}
