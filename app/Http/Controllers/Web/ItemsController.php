<?php

namespace App\Http\Controllers\Web;

use App\Helper\ESHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemsFormRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:create items', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit items', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete items', ['only' => ['destroy']]);
        $this->middleware('permission:see logs', ['only' => ['logs']]);
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('system/view/item/index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("system/view/item/form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemsFormRequest $req)
    {
        $req->validated();
        try {
            $item = Item::create($req->only(['name', 'description']));
            (new ESHandler())->store([
                "id" => $item->id,
                'index' => "items-index",
                'body' => [
                    'id' => $item->id,
                    'item' => $req->get('name'),
                    'status' => "Created",
                    'user' => auth()->user()->name,
                    'updated_at' => $item->updated_at
                ]
            ]);
            return $this->setToast('success', 'Berhasil Mengubah Barang', 'system.barang.index');
        } catch (\Throwable $th) {
            dd($th);
            return $this->setToast('error', 'Error', 'system.barang.index');
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
        $item = Item::whereId($id)->first();
        if(!$item){
            return $this->setToast('error', 'Barang tidak ditemukan', 'system.barang.index');
        }

        return view('system/view/item/detail', [
            'data' => $item
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::whereId($id)->first();
        if(!$item){
            return $this->setToast('error', 'Barang tidak ditemukan', 'system.barang.index');
        }
        return view("system/view/item/form", [
            "data" => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemsFormRequest $request, $id)
    {
        $item = Item::whereId($id)->first();
        if(!$item){
            return $this->setToast('error', 'Barang tidak ditemukan', 'system.barang.index');
        }
        $item->update($request->only(['name', 'description']));
        (new ESHandler())->store([
            "id" => $item->id,
            'index' => "items-index",
            'body' => [
                'id' => $item->id,
                'item' => $request->get('name'),
                'status' => "Edited",
                'user' => auth()->user()->name,
                'updated_at' => $item->updated_at
            ]
        ]);
        return $this->setToast('success', 'Berhasil Mengubah Barang', 'system.barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::whereId($id)->first();
        if(!$item){
            return $this->setToast('error', 'Barang tidak ditemukan', 'system.barang.index');
        }
        $item->delete();
        return $this->setToast('success', 'Berhasil Menghapus Barang', 'system.barang.index');
    }

    private function setToast($type, $message, $routename)
    {
        $toast = array(
            'typeToast' => $type,
            'messageToast' => $message,
        );
        return redirect()->route($routename)->with($toast);
    }

    public function logs($id)
    {
        $item = Item::whereId($id)->first();
        if(!$item){
            return $this->setToast('error', 'Barang tidak ditemukan', 'system.barang.index');
        }

        $data = (new ESHandler())->get('items-index', [
            'query' => [
                'multi_match' => [
                    'query' => $item->id,
                    'fields' => [
                        'id'
                    ]
                ]
            ]
        ]);
        return view('system/view/item/logs', [
            'items' => $data
        ]);
    }
}
