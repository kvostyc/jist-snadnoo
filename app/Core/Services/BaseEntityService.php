<?php

namespace App\Core\Services;

use App\Core\Services\Interfaces\BaseEntityServiceInterface;
use Illuminate\Database\Eloquent\Model;

/**
* Base service class for all entity operations
*/
class BaseEntityService implements BaseEntityServiceInterface
{
    protected ?string $model = null;

    /**
    * Find entity by ID
    */
    public function find($id)
    {
        if ($this->model) {
            return $this->model::find($id);
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Get all entities
    */
    public function findAll()
    {
        if ($this->model) {
            return $this->model::all();
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Get active entities
    */
    public function findActive()
    {
        if ($this->model) {
            return $this->model::where('is_public', '=', 1)->get();
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Create new entity
    */
    public function create($data)
    {
        if ($this->model) {
            return $this->model::create($data);
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Remove entity by ID
    */
    public function remove($id)
    {
        if ($this->model) {
            return $this->model::destroy($id);
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Update existing entity
    */
    public function update(Model $model, array $data)
    {
        if ($this->model) {
            return $model->update($data);
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Get entity by name
    */
    public function getByName(string $name): ?Model
    {
        if ($this->model) {
            return $this->model::whereName($name)->first();
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Get entity by identifier
    */
    public function getByIdentifier(string $identifier): ?Model
    {
        if ($this->model) {
            return $this->model::whereIdentifier($identifier)->first();
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Create or get existing entity
    */
    public function firstOrCreate(array $attributes, array $values = []): Model
    {
        if ($this->model) {
            return $this->model::firstOrCreate($attributes, $values);
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Update or create entity
    */
    public function updateOrCreate(array $attributes, array $values = []): Model
    {
        if ($this->model) {
            return $this->model::updateOrCreate($attributes, $values);
        }

        throw new \Exception('Model is not defined');
    }

    /**
    * Save entity
    */
    public function save(Model $model)
    {
        return $model->save();
    }
}
