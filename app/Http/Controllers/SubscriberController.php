<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $subscribers = Subscriber::paginate($paginate);
        return view('pages.dashboards.subscribers.index', ['status' => SubscriberResource::collection($subscribers)]);
    }
}
