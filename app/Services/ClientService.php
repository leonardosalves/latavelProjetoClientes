<?php
namespace FormularioAplicacao\Services;
use FormularioAplicacao\Repositories\ClientRepository;
use FormularioAplicacao\Validators\ClientValidator;


class ClientService
{
    protected $repository;
    protected $validator;

    public function __constructor(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function all(){
        
        return $this->repository->all();

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

    public function show($id)
    {
        return $this->repository->findWhere(['id' => 1]);
    }

}
