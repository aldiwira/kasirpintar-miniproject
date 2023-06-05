<?php

namespace App\Helper;

use Elasticsearch;

class ESHandler {

    public function get($index, $body)
    {
        try {
            $items = Elasticsearch::search([
                'index' => $index,
                'body'  => $body
            ]);
            $data = array_column($items['hits']['hits'], '_source');
            return $data;
        } catch (\Throwable $th) {
            return [];
        }

    }

    public function store($data)
    {
        return Elasticsearch::index($data);
    }
}
