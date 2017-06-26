<?php

namespace FormularioAplicacao\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FormularioAplicacao\Repositories\ProjectNotesRepository;
use FormularioAplicacao\Entities\ProjectNotes;
use FormularioAplicacao\Validators\ProjectNotesValidator;

/**
 * Class ProjectNotesRepositoryEloquent
 * @package namespace FormularioAplicacao\Repositories;
 */
class ProjectNotesRepositoryEloquent extends BaseRepository implements ProjectNotesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNotes::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
