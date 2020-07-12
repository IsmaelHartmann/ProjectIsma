<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mov;

class MovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objMov;

    public function __construct(){
        $this->objMov = new Mov();
    }

    public function index()
    {
        //return view('teste');
        $mov = $this->objMov->all();
        return view('index', compact('mov'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objMov->create([
            'descricao'=>$request->descricao
        ]);
       // if($cad){
         //   return redirect('movimentacoes');
        //}
    }

    public function storeAPI(Request $request)
    {
        $cad = $this->objMov->create([
            'descricao'=>$request->descricao
        ]);

        return response()->json($cad, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mov = $this->objMov->find($id);
        return view('show', compact('mov'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mov=$this->objMov->find($id);
        return view('create', compact('mov'));
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
        $this->objMov->where(['id'=>$id])->update([
            'descricao'=>$request->descricao
        ]);
        return redirect('movimentacoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mov::find($id)->delete();
        //return redirect('movimentacoes');
        return redirect()->back();
    }
}
