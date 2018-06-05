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

    public function action(Booking $booking, Request $request, $id)
    {
        $booking = $booking->findOrFail($id);

        $action = $request->action;

        switch ( $action ) {
            case 'approve':

                $booking->status = 1;
                $booking->save();

                // send approval/payment mail.

                break;
            case 'reject':
                $booking->status = 2;
                $booking->save();

                break;
            case 'confirm':
                $booking->status = 3;
                $booking->save();

                // send confirmation mail.

                break;
            default:
                break;
        }

        return redirect()->back()->withMessage('Action Taken Successfully');
    }
}
