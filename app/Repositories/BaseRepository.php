<?php
namespace App\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @throws \Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'], $withTrashed = false, $slug = false)
    {
        $query = $this->model->newQuery();

        $columns = array_map(function ($column) {
            return "{$this->model->getTable()}.$column";
        }, $columns);

        if ($withTrashed) {
            $query->withTrashed();
        }

        $field = 'id';
        if ($slug == true) {
            $field = 'slug';
        }

        return $query->where("{$this->model->getTable()}.$field", $id)->select($columns)->first();
    }

    public function get()
    {
        return $this->model->get();
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     * @param boolean $withTrashed
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update(array $input, $id, $withTrashed = false)
    {
        $query = $this->model->newQuery();

        if ($withTrashed) {
            $query->withTrashed();
        }

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->withTrashed()->findOrFail($id);

        return $model->delete();
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function restore($id)
    {
        $query = $this->model->newQuery();

        $model = $query->withTrashed()->findOrFail($id);

        $model->is_deleted = 0;

        return $model->restore();
    }

    public function updateOrCreate($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $search = ['id' => $id];
        return $this->model->updateOrCreate($search, $data);
    }

    public function deleteByType($ids, $source_id, $type = 'user_id')
    {
        $query = $this->model->where($type, $source_id);
        if (!empty($ids)) {
            $query->whereNotIn('id', $ids);
        }
        $query->delete();
    }

    public function forcedelete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->withTrashed()->findOrFail($id);

        return $model->forceDelete();
    }
}
