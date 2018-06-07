<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Booking;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Mail\SendMailOnBookingApproval;
use App\Mail\SendMailOnBookingConfirmation;
use \Mail;
class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Booking $booking)
    {
        // config()->set('database.connections.mysql.strict', false);

        $bookings = $booking->with('equipment', 'equipmentAvailability', 'user')
                        ->select([\DB::raw('DISTINCT order_id'), 'id', 'equipment_id', 'equipment_availability_id', 'user_id', 'created_at', 'updated_at', 'status']);

        if( auth()->user()->isInstituteAdmin() )
        {
            $institute_id = auth()->user()->institute_id;

            $bookings = $bookings->whereHas('equipmentAvailability', function( $q ) use( $institute_id ) {
                        $q->where('institute_id', $institute_id);
                    });
        }

        if( $equipment_id = request('equipment_id') )
        {
            $bookings = $bookings->where('equipment_id', $equipment_id );
        }

        $bookings = $bookings->paginate( 20 );
        

        return view('admin.bookings.index', compact( 'bookings') );
    }

    public function show(Booking $booking, Request $request, $order_id )
    {
        $bookings = $booking->with('equipment', 'equipmentAvailability', 'user')
                        ->where('order_id', $order_id)
                        ->get();

        if( empty( $bookings) )
        {
            abort('404', 'No Booking Exists with order_id');
        }

        if( auth()->user()->isInstituteAdmin() )
        {
            $institute_id = auth()->user()->institute_id;
            $booking_equipment_institute_id = $bookings->first()->equipmentAvailability->institute_id ?? NULL;
            if( $booking_equipment_institute_id != $institute_id )
            {
                abort('403', 'You are not allowed to access');
            }
        }

        $equipment = $bookings->first()->equipment;
        
        return view('admin.bookings.show', compact( 'bookings', 'equipment' ) );
    }

    public function action(Booking $booking, Request $request, $id)
    {
        $booking = $booking->findOrFail($id);

        if( ( !auth()->user()->isInstituteAdmin() ) || ( auth()->user()->institute_id != $booking->equipmentAvailability->institute_id) )
        {
            abort('403', 'You are not allowed to perform this action');
        }

        $action = $request->action;

        switch ( $action ) {
            case 'approve':

                $booking->status = 1;
                $booking->save();

                // send approval/payment mail.
                Mail::to($booking->user)->send(new SendMailOnBookingApproval($booking));

                break;
            case 'reject':
                $booking->status = 2;
                $booking->save();

                break;
            case 'confirm':
                $booking->status = 3;
                $booking->save();

                // send confirmation mail.
                Mail::to($booking->user)->send(new SendMailOnBookingConfirmation($booking));

                break;
            default:
                break;
        }

        return redirect()->back()->withMessage('Action Taken Successfully');
    }
}
