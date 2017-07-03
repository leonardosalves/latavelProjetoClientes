<?php

namespace FormularioAplicacao\Http\Controllers;

use FormularioAplicacao\Services\ProjectService;
use FormularioAplicacao\Repositories\ProjectRepository;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    private $service;
    private $repository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProjectService $service, ProjectRepository $repository){
        $this->service = $service;
        $this->repository = $repository;
    }

    private function checkProjectOwner($projectid)
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectid, $userId);
    }
    
    private function checkprojectMember()
    {
        $userId = \Authorizer::getResourceOwnerId();

        return $this->repository->hasMember($projectid, $userId);
    }

    private function checkProjectPermissions()
    {
        if($this->checkProjectOwner($projectid) or $this->checkprojectMember($projectid))
        {
            return true;
        }

        return false;
    }

    public function index()
    {
        //
        //return $this->service->all();
       // return response()->json($clients);
       return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
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
        if($this->checkProjectOwner($id) == false )
        {
            return ['error' =>  'Access Forbiden'];
        }
        return $this->repository->find($id);
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
