<?php

namespace App\Http\Controllers;

use App\Events\AdvertShowEvent;
use App\Http\Resources\Advert\AdvertCollection;
use App\Http\Resources\Advert\AdvertResource;
use App\Models\Advert;
use App\Repositories\AdvertRepository;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    protected $perPage;

    public function __construct()
    {
        $this->perPage = 20;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $adverts = Advert::isActive()->paginate($this->perPage);
        return StatusRepository::response(new AdvertCollection($adverts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $advert = AdvertRepository::find($id, true)
        ?? StatusRepository::notFound('advert');

        return StatusRepository::response( new AdvertResource($advert));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
