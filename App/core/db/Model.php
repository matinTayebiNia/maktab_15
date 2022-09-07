<?php

namespace App\core\db;

use App\core\Application;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    public static function pagination($limit, $data = null): array
    {
        if (is_null($data)) {
            $data = static::query();
            $data = $data->latest()->get();
        }

        $result = [];
        foreach ($data as $datum) {
            $result[] = $datum;
        }
        $page = Application::$app->request->getBody()["page"] ?? 1;
        $number_of_result = count($result);
        $number_of_pages = ceil($number_of_result / $limit);
        $this_page_first_result = ($page - 1) * $limit;
        $paginate = (object)[
            "totalPage" => $number_of_pages,
            "prevPage" => $page - 1 != 0 ? $page - 1 : false,
            "nextPage" => $page + 1 < $number_of_pages ? $page + 1 : false,
            "page" => $page
        ];
        return array($paginate, array_slice($result, $this_page_first_result, $limit));
    }
}