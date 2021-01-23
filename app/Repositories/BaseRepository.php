<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritdoc
     */

    public function index(){
        return $this->model->get();
    }

    public function create(Request $request){
        $object = $this->model::create(
            $request->all()
        );
        return response()->json([
            'message' => 'created success',
            'data' => $object
        ], 200);
    }

    public function findById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function update(Request $request, int $id){
        $this->model->find($id)->update(
            $request->all()
        );
        $object = $this->model->find($id);
        return response()->json([
            'message' => 'updated success',
            'data' => $object
        ], 200);
    }
}
