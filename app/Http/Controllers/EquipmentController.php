<?php

namespace App\Http\Controllers;

use App\Category;
use App\Institute;
use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Equipment            $equipment
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Equipment $equipment, Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json($equipment->with('institutes')->get());
        }

        return view('equipments.index')
            ->with('categories', Category::all(['id', 'name']))
            ->with('institutes', Institute::all(['id', 'name', 'city']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment            $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Equipment $equipment)
    {
        // if ($request->wantsJson()) {
            $equipment = $equipment->load([
                'institutes' => function ($query) use ($request) {
                    $query->where('id', $request->get('institute'));
                },
                'availability' => function ($query) use ($request) {
                    $query->where('institute_id', $request->get('institute'));
                },
                'category'
            ]);

        $equipment->availability = $equipment->availability->transform(function ($available) {
            $available->date = \Carbon\Carbon::parse($available->from)->format('Y/m/d');
            $available->from = \Carbon\Carbon::parse($available->from)->format('h:i A');
            $available->to = \Carbon\Carbon::parse($available->to)->format('h:i A');
            $available->title = '';

            return $available;
        });

            // return response()->json($equipment);
        // }

        return view('equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment            $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment            $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment            $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
