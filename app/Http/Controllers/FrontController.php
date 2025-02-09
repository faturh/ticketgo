<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    // konsep service repository pattern
    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', $data);

        // konsep mcvp
    // public function index(){
    //     $categories = Category::latest()->get();
    //     $popular_tickets = Ticket::where('is_popular', true)->take(4)->get();
    //     $new_tickets = Ticket::latest()->get();

    //     return view('front.index', compact('categories', 'popular_tickets', 'new_tickets'));
    // }

}
