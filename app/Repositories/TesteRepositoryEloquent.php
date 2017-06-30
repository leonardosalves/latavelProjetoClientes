<?php

namespace FormularioAplicacao\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FormularioAplicacao\Repositories\testeRepository;
use FormularioAplicacao\Entities\Teste;
use FormularioAplicacao\Validators\TesteValidator;

/**
 * Class TesteRepositoryEloquent
 * @package namespace FormularioAplicacao\Repositories;
 */
class TesteRepositoryEloquent extends BaseRepository implements TesteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Teste::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
