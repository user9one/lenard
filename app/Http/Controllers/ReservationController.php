<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\ReservationService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
   
    public function saveReservation(Request $request)
    {

        $client_id = Session::get('client_id');

        $reservation = new Reservation();
        $reservation->client_id = $client_id;
        $reservation->facility_id = $request->facilityId;
        $reservation->purpose = $request->purpose;
        $reservation->event_name = $request->event_name;
        $reservation->participants = $request->participants;
        $reservation->eventDateFrom = $request->eventDateFrom;
        $reservation->eventDateTo = $request->eventDateTo;
        $reservation->startTime = $request->startTime;
        $reservation->endTime = $request->endTime;
        $reservation->total = $request->totalPrice;
  
        $reservation->save();

        Session::put('reservation_id', $reservation['id']);

        return response()->json(['message' => 'Reservation created successfully', 'reservation' => $reservation], 201);
    }
    //---------------------reservation----------------------------//
    public function approveReservation($id){
        $approval = Reservation::find($id);
        $approval->status = 1;
        $approval->save();

        return $approval;
    }
    public function cancelReservation($id){
        $approval = Reservation::find($id);
        $approval->status = 2;
        $approval->save();

        return $approval;
    }
    public function index()
{
    $adminId = Auth::id();

    // Retrieve reservations
    $reservationsData = Reservation::select('*', DB::raw("reservations.id as reservation_id"))
        ->join('facility', 'reservations.facility_id', '=', 'facility.id')
        ->join('clients', 'reservations.client_id', '=', 'clients.id')
        ->where('admin_id', $adminId)
        ->get();

    // Initialize an empty array to store the result
    $reservations = [];

    // Loop through each reservation and fetch associated services
    foreach ($reservationsData as $reservation) {
        $reservationId = $reservation->reservation_id;

        // Retrieve services for the current reservation
        $services = ReservationService::select('*', DB::raw("reservation_services.id as reservation_service_id"))
            ->join('services', 'reservation_services.service_id', '=', 'services.id')
            ->where('reservation_id', $reservationId)
            ->get();

        // Add the reservation and its associated services to the result array
        $reservations[] = [
            'reservation_details' => $reservation,
            'services_details' => $services,
        ];
    }

    // Return the result as JSON
    return response()->json($reservations);

}

}