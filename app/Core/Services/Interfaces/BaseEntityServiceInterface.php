<?php

namespace App\Core\Services\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
* Interface for base entity service operations
*/
interface BaseEntityServiceInterface
{
    /**
    * Find entity by ID
    */
    public function find($id);

    /**
    * Get all entities
    */
    public function findAll();

    /**
    * Get active entities
    */
    public function findActive();

    /**
    * Create new entity
    */
    public function create($data);

    /**
    * Remove entity by ID
    */
    public function remove($id);

    /**
    * Update existing entity
    */
    public function update(Model $model, array $data);

    /**
    * Get entity by name
    */
    public function getByName(string $name): ?Model;

    /**
    * Get entity by identifier
    */
    public function getByIdentifier(string $identifier): ?Model;

    /**
    * Create or get existing entity
    */
    public function firstOrCreate(array $attributes, array $values = []): Model;

    /**
    * Update or create entity
    */
    public function updateOrCreate(array $attributes, array $values = []): Model;

    /**
    * Save entity
    */
    public function save(Model $model);
}
