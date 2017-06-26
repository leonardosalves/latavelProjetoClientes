<?php

namespace FormularioAplicacao\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
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
}
