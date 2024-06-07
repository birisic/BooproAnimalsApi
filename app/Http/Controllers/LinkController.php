<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class LinkController extends Controller
{
    public function create()
    {
        $links = Link::select("url", "internal_id")->get();
        return view("Links.create", ["links" => $links]);
    }

    public function store(StoreLinkRequest $request)
    {
        try {
            $link = new Link();
            $link->url = $request->url;
            $link->created_at = Carbon::now();
            $link->publish_at = $request->publishAt;
            $link->delete_at = $request->deleteAt;
            $link->internal_id = $link->getInternalId();
            $link->save();

            return back()->with(["success" => "Successfully created a new link."]);
        }
        catch (Exception $e){
            Log::error($e->getMessage());
            return back()->with(["error" => "An error occurred while trying to create a new link. Please try again later."]);
        }
    }
}
