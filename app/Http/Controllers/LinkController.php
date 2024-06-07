<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use Carbon\Carbon;

class LinkController extends Controller
{
    public function create()
    {
        return view("Links.create");
    }

    public function store(StoreLinkRequest $request)
    {
        return back()->with(["success" => "Successfully added a new link."]);
        $date1 = Carbon::create(2024, 2,10);
        $date2 = Carbon::create(2024, 5,10);

        $link = new Link();
        $link->url = "url";
        $link->created_at = Carbon::now();
        $link->publish_at = $date1;
        $link->delete_at = $date2;
        $link->internal_id = $link->getInternalId();

        dd($link->internal_id);
    }
}
