<?php

namespace FormularioAplicacao\Http\Middleware;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use FormularioAplicacao\Repositories\ProjectRepository;

use Closure;

class CheckProjectOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $repository;


    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($request, Closure $next)
    {
        
        $id = $request->id;
        $user = \Authorizer::getResourceOwnerId();

        if(!$this->repository->isOwner($id,$user)){
            return ['success' => false];
        }
        
        return $next($request);
    }
}
