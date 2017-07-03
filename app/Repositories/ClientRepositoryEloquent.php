<?php

namespace FormularioAplicacao\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FormularioAplicacao\Repositories\ClientRepository;
use FormularioAplicacao\Entities\Client;
use FormularioAplicacao\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace FormularioAplicacao\Repositories;
 */


class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
