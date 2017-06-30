<?php
namespace FormularioAplicacao\Services;
use Prettus\Validator\Exceptions\ValidatorException;
use FormularioAplicacao\Repositories\ClientRepository;
use FormularioAplicacao\Validators\ClientValidator;

class ClientService
{
    protected $repository;
    protected $validator;
    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    public function all(){
        try{
            return $this->repository->all();
        }catch(\Illuminate\Database\QueryException $e){
            return [
                'error' => true,
                'message' => "Não há clientes"
            ];
        }
    }


    public function getProjects($id)
    {
        try{
            $client = new \FormularioAplicacao\Entities\Client;
            $client = $client->find($id);
            return $client->projects()->get();
        }catch(\Symfony\Component\Debug\Exception\FatalErrorException $e){
            return ['error' => true, 'message' => 'Projeto não encontrado.'];
        }catch (\League\Flysystem\Exception $e) {
            return ['error'=>true, 'Ocorreu algum erro ao procurar pelo projeto deste cliente.'];
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
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Cliente não encontrado.'];
        }
        
    }
    public function show($id)
    {
        try{
            return $this->repository->find($id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Cliente não encontrado.'];
        }
        
    }

    

    public function delete($id)
    {     
         try{
            $filter = $this->repository->find($id)->projects->count();
            if($filter > 0){
                return ['error' => true, 'message' => 'You cannot delete a client whith a project'];
            }else{
                $this->repository->delete($id);
                return ['message' => 'Client deleted with success!'];
            }
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Cliente não encontrado.'];
        }
        
    }

}