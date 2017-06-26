<?php 

namespace FormularioAplicacao\Services;

use FormularioAplicacao\Repositories\ProjectNotesRepository;
use FormularioAplicacao\Validators\ProjectNotesValidator;

class ProjectNotesService
{
    protected $respository;
    protected $validator;

    public function __constructor(ProjectNotesRepository $respository, ProjectNotesValidator $validator)
    {
        $this->respository = $respository;
        $this->validator = $validator;
    }

    public function create(array  $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->respository->create($data);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }

        
    }

    public function update(array  $data, $id)
    {
        return $this->respository->update($data, $id);
    }
}