<?php

namespace App\controller;


use App\core\Controller;
use App\core\Request\Request;
use App\core\Response;
use App\Models\Lab;

class SiteController extends Controller
{

    public function home(): array|bool|string
    {
        return $this->render("home");
    }

    public function laboratory(Request $request): string
    {
        $search_data = null;
        $lab = Lab::query();
        if ($word = $request->input("search")) {
            $search_data = $lab->where("labName", "LIKE", "%{$word}%")
                ->latest()->get();
        }

        list($paginate, $data) = Lab::pagination(4, $search_data);

        return $this->render("labs", compact("paginate", "data"));
    }

    public function doctors(Request $request)
    {
        $search_data = null;
        $id = $request->getRouteParam("id");
        $lab = Lab::query();
        $search_data = $lab->find($id);
        if ($word = $request->input("search")) {
            $search_data = $lab->whereHas("doctors", function ($query) use ($word) {
                return $query->where("Expert", "LIKE", "%{$word}%")
                    ->orWhereHas("user", function ($query) use ($word) {
                        return $query->where("name", "LIKE", "%{$word}%")
                            ->orWhere("lastname", "LIKE", "%{$word}%");
                    });
            })->latest()->get();
        }
        //todo: implement show doctors

    }

}