<?php

namespace FormularioAplicacao\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use FormularioAplicacao\Repositories\ProjectRepository;
use FormularioAplicacao\Entities\Project;
use FormularioAplicacao\Validators\ProjectValidator;
use FormularioAplicacao\Presenters\ProjectPresenter;

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

    public function isOwner($projectid, $userId)
    {
        if( count($this->findWhere(['id' => $projectid, 'owner_id' => $userId]))){
            return true;
        }

        return false;
    }

    public function hasMember($projectId, $memberId)
    {
        $project = $this->$projectId;

        foreach($project->members as $member)
        {
            if($member->id == $memberId)
            {
                return true;
            }

            return false;
        }
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }
}
