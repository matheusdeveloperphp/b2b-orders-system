<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    protected $repository;

    /**
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return Collection
     */
    public function list($id)
    {
        return $this->repository->all();
    }

    /**
     * @param $data
     * @return Product
     */
    public function store($data)
    {
        return $this->repository->create($data);
    }

}
