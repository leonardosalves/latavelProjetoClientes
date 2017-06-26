<?php

namespace FormularioAplicacao\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FormularioAplicacao\Repositories\ProjectRepository;
use FormularioAplicacao\Entities\Project;
use FormularioAplicacao\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace FormularioAplicacao\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
