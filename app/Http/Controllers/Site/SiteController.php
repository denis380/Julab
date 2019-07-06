<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    
    public function index(){

        $events = Event::all();
        $event = [];
        
        foreach($events as $row){
            $enddate = $row->end_date." 24:00:00";
            $event[] = \Calendar::event(
                $row->title,
                true,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        $calendar = \Calendar::addEvents($event);
        return view('site.home.index', compact('calendar'));
    }
}
