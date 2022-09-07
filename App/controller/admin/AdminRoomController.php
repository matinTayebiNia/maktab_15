<?php

namespace App\controller\admin;

use App\core\Controller;
use App\core\Request\Request;
use App\Middlewares\admin\ApprovedAdmin;
use App\Middlewares\admin\IsAdmin;
use App\Middlewares\RedirectIfIsNotAuthenticated;
use App\Models\Lab;
use App\Models\Room;

class AdminRoomController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware(new RedirectIfIsNotAuthenticated());
        $this->setMiddleware(new IsAdmin());
        $this->setMiddleware(new ApprovedAdmin());
        $this->setLayout("adminLayout");
    }

    public function index(Request $request): string
    {
        $doctor = Room::query();
        $search_data = null;
        if ($word = $request->input("search")) {
            $search_data = $doctor->where("room_type", "LIKE", "%{$word}%")
                ->orWhere("status", "LIKE", "%{$word}%")
                ->orWhere("name", "LIKE", "%{$word}%")
                ->orWhereHas("lab", function ($query) use ($word) {
                    return $query->where("labName", "LIKE", "%{$word}%");
                })->latest()->get();
        }

        list($paginate, $data) = Room::pagination(4, $search_data);

        return $this->render("admin/rooms/index",
            compact("paginate", "data"));
    }

    public function create(): string
    {
        $lab = Lab::all();
        return $this->render("admin/rooms/create", compact("lab"));
    }

    public function store(Request $request)
    {
        $validation = $request->validation([
            "room_type" => ["required"],
            "name" => ["required"],
            "lab" => ["required"]
        ], [
            "room_type.required" => "نوع اتاق مشخص نشده.",
            "name.required" => "نام اتاق مشخص نشده.",
            "lab.required" => "آزمایشگاه اتاق مشخص نشده.",
        ]);

        Room::create([
            "room_type" => $validation->getAttribute("room_type"),
            "name" => $validation->getAttribute("name"),
            "lab_id" => $validation->getAttribute("lab")
        ]);

        $this->setFlashMessages("success", "اتاق با موفقیت ثبت شد.");
        return $this->redirect("/admin/rooms");

    }

    public function edit(Request $request): string
    {
        $lab = Lab::all();
        $id = $request->getRouteParam("id");
        $room = Room::find($id);
        return $this->render("admin/rooms/edit", compact("lab", "room"));
    }

    public function update(Request $request)
    {
        $validation = $request->validation([
            "room_type" => ["required"],
            "name" => ["required"],
            "status"=>["required"],
            "lab" => ["required"]
        ], [
            "room_type.required" => "نوع اتاق مشخص نشده.",
            "name.required" => "نام اتاق مشخص نشده.",
            "lab.required" => "آزمایشگاه اتاق مشخص نشده.",
            "status.required"=>"وضعیت اتاق مشخص نشده."
        ]);
        $id = $request->getRouteParam("id");
        $room = Room::find($id);

        $room->update([
            "room_type" => $validation->getAttribute("room_type"),
            "name" => $validation->getAttribute("name"),
            "status" => $validation->getAttribute("status"),
            "lab_id" => $validation->getAttribute("lab")
        ]);

        $this->setFlashMessages("success", "اتاق با موفقیت ویرایش شد.");
        return $this->redirect("/admin/rooms");
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->input("delete_id");
            Room::destroy($id);
            $this->setFlashMessages("success", "اتاق با موفقیت حذف شد");
            return $this->redirect("/admin/rooms");
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}