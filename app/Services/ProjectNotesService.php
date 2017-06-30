<?php

namespace FormularioAplicacao\Services;

use FormularioAplicacao\Repositories\ProjectNotesRepository;
use FormularioAplicacao\Validators\ProjectNotesValidator;

class ProjectNotesService
{
    protected $repository;
    protected $validator;
    public function __construct(ProjectNotesRepository $repository, ProjectNotesValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function getAll()
    {
      
        try{   
             return  $this->repository->with('project')->all();
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Notas de Projeto não encontrado.'];
        }
    }

    public function all($id){
        try{
            dd($this->repository->with('project')->findWhere(['project_id' =>  $id])->count());
            //$this->repository->with('project')->findWhere(['project_id' =>  $id]);
            return $this->repository->with('project')->findWhere(['project_id' =>  $id]);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Notas de Projeto não encontrado.'];
        }
    }

    public function create(array  $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
        
    }
    public function update(array  $data, $id)
    {
        try{
            $this->repository->update($data, $id);
            return $this->repository->find($id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Notas de Projeto não encontrado.'];
        }
    }
    public function show($id)
    {
        try{
            return $this->repository->find($id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Notas de Projeto não encontrado.'];
        }
    }

    

    public function delete($id)
    {
        try{
            $this->repository->delete($id);
            return ['message' => 'Notas do Prijeto removida'];
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Notas de Projeto não encontrado.'];
        }
    }

}