<?php

namespace FormularioAplicacao\Http\Controllers;

use FormularioAplicacao\Services\ProjectNotesService;use Illuminate\Http\Request;

class ProjectNotesController extends Controller
{
    
    private $service;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProjectNotesService $service){
        $this->service = $service;
    }
    
    public function allNotes()
    {
        return $this->service->getAll();
    }



    public function index($id_project)
    {
        //
        return $this->service->all($id_project);
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
        return $this->service->delete($id);
    }
}
