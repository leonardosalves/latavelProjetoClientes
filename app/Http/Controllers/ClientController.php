<?php

namespace FormularioAplicacao\Http\Controllers;

use FormularioAplicacao\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ClientService $service){
        $this->service = $service;
    }
    
    public function allProjects($id)
    {
        return $this->service->getProjects($id);
    }

    public function index()
    {
        //
        return $this->service->all();
       // return response()->json($clients);
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
        return $this->service->create($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->service->show($id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $this->service->find($id)->save();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        return $this->service->update($request->all(), $id);
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $this->service->delete($id);
    }
}
