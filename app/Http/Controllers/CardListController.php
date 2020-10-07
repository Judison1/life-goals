<?php

namespace App\Http\Controllers;

use App\Models\CardList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CardListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try {
            CardList::create($request->all());
            DB::commit();
            return back()->with('success','Cadastro realizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Não foi possível realizar o cadastro!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cardList = CardList::findOrFail($id);
        return view('card-list.edit', compact('cardList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $cardList = $cardList = CardList::findOrFail($id);
            $cardList->update($request->all());
            DB::commit();
            return redirect()->route('dashboard::boards.show', $cardList->board)->with('success','Registro alterado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Não foi possível atualizar o registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $cardList = CardList::findOrFail($id);
            $cardList->delete();
            DB::commit();
            return back()->with('success','Lista de card removida com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Não foi possível realizar a operação');
        }
    }
}
