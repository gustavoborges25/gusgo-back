<?php

namespace Modules\Control\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Control\Facades\Ibge;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('control::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('control::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('control::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('control::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function getStatesExternal()
    {
        $answer = Ibge::getStates();

        if (!$answer || isset($answer->erro)) {
            return response()->json(
                [
                    'errors' => [
                        'Cidades' => ['Não foi possível buscar as cidades!']
                    ]
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json($answer);
    }

}
