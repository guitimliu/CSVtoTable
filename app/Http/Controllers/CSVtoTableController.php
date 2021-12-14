<?php

namespace App\Http\Controllers;

use App\Models\CSVtoTable;
// use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CSVtoTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 50;

        $CSVtoTable = CSVtoTable::orderBy('id', 'desc')
            ->paginate($limit)
            ->appends($request->query());
        // $CSVtoTable = CSVtoTable::get();
        return response(['data' => $CSVtoTable], Response::HTTP_OK);
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
        $CSVtoTable = CSVtoTable::create($request->all());
        $CSVtoTable = $CSVtoTable->refresh();
        return response($CSVtoTable, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSVtoTable  $cSVtoTable
     * @return \Illuminate\Http\Response
     */
    public function show(CSVtoTable $cSVtoTable)
    {
        return response($cSVtoTable, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSVtoTable  $cSVtoTable
     * @return \Illuminate\Http\Response
     */
    public function edit(CSVtoTable $cSVtoTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CSVtoTable  $cSVtoTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CSVtoTable $cSVtoTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSVtoTable  $cSVtoTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(CSVtoTable $cSVtoTable)
    {
        //
    }
}
