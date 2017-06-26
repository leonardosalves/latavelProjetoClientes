<?php 

namespace FormularioAplicacao\Services;

use FormularioAplicacao\Repositories\ProjectRepository;
use FormularioAplicacao\Validators\ProjectValidator;

class ProjectService
{
    protected $repository;
    protected $validator;

    public function index()
    {
        $this->repository->all();
    }

    public function __constructor(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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
        return $this->repository->update($data, $id);
    }
}