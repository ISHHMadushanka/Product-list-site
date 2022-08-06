<?php

namespace domain\Services;

use App\Models\Product;

class ProductService
{
    protected $item;

    public function __construct()
    {
        $this->item = new Product();
    }


    public function get($item_id)
    {
        return $this->item->find($item_id);
    }


    public function all()
    {
       return $this->item->all();
    }


    public function store($data)
    {
        $this->item->create($data);

    }

    public function delete($item_id)
    {
        $item = $this->item->find($item_id);
        $item->delete();

    }

    public function done($item_id)
    {
        $item = $this->item->find($item_id);
        $item->done = 1;
        $item->update();

    }

    public function update(array $data, $item_id)
    {
        $item = $this->item->find($item_id);
        $item->update($this->edit($item, $data));
    }

    protected function edit(Product $item, $data)
    {
        return array_merge($item->toArray(), $data);
    }

}


