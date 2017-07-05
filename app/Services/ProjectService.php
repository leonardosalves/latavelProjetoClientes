<?php
namespace FormularioAplicacao\Services;
use FormularioAplicacao\Repositories\ProjectRepository;
use FormularioAplicacao\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Filesystem\Filesystem;
use \Illuminate\Contracts\Filesystem\Factory;

class ProjectService
{
    protected $repository;
    protected $validator;
    protected $filesystem;
    protected $storage;
    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem, Factory $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }
    public function all()
    {
        try{
            return $this->repository->with(['notes','client'])->all();
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Projeto não encontrado.'];
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
            return $this->repository->update($data, $id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Projeto não encontrado.'];
        }
    }
    public function show($id)
    { 
        try{
            return $this->repository->with(['notes','client'])->find($id);
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Projeto não encontrado.'];
        }
    }

    

    public function delete($id)
    {
       
        try{
             $this->repository->delete($id);
             return ['message' => 'Projeto removido'];
        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ['error' => true, 'message' => 'Projeto não encontrado.'];
        }
    }
public function createFile(array $data)
{
    $project = $this->repository->skipPresenter()->find($data['project_id']);
    $projectFile = $project->files()->create($data);
    $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));  
}


}