<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * キャラクター一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('character_index');

    }
    

    /**
     * キャラクター作成画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('character_create');
    }

    /**
     * 新規キャラクターの保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|url',
            'settings' => 'required',
        ]);

        $character = new Character([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'settings' => $request->input('settings'),
        ]);

        $character->save();

        return redirect()->route('characters.index')->with('success', 'キャラクターが追加されました。');
    }

    /**
     * キャラクター編集画面表示
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        return view('character_edit', compact('character'));
    }

    /**
     * キャラクター情報の更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|url',
            'settings' => 'required',
        ]);

        $character->name = $request->input('name');
        $character->image = $request->input('image');
        $character->settings = $request->input('settings');
        $character->save();

        return redirect()->route('characters.index')->with('success', 'キャラクター情報が更新されました。');
    }

    /**
     * キャラクターの削除
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index')->with('success', 'キャラクターが削除されました。');
    }
}


