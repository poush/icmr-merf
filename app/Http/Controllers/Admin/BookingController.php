<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Booking;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Booking $booking)
    {
        $bookings = $booking->paginate(20);

        return view('admin.bookings.index', compact( 'bookings') );
    }
}
