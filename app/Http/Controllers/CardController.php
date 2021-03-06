<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
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
    public function create($id)
    {
        return view('card.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $cardList = CardList::findOrFail($id);
            $lastCard = $cardList->cards()->orderBy('rank', 'desc')->first();
            $card = $cardList->cards()->create([
                'title' => $request->title,
                'description' => $request->description,
                'rank' => $lastCard?$lastCard->rank + 1:1,
            ]);
            if ($request->hasFile('attachment')) {
                $storage = $request->attachment->store('attachments', 'public');
                $card->attachments()->create(['file_path' => $storage]);
            }
            DB::commit();
            return redirect()->route('dashboard::boards.show', $cardList->board);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
//            return back();
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
        $card = Card::findOrFail($id);

        return view('card.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::findOrFail($id);

        return view('card.edit', compact('card'));
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
            $card = Card::findOrFail($id);
            $card->update($request->all());
            if ($request->hasFile('attachment')) {
                $storage = $request->attachment->store('attachments', 'public');
                $card->attachments()->create(['file_path' => $storage]);
            }
            DB::commit();
            return redirect()->route('dashboard::boards.show', $card->cardList->board);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Não foi possível realizar a operação');
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
            $card = Card::findOrFail($id);
            $card->delete();
            DB::commit();
            return back()->with('success','Card removido com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Não foi possível realizar a operação');
        }
    }
}
