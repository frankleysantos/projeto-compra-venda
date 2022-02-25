<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProdutoController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($produto_id = null)
  {
    $produtos = DB::table('produtos as p')
                  ->join('categoria_produtos as cp', 'p.categoria_produto_id', 'cp.id')
                  ->select('p.id as produto_id', 'p.nome as produto', 'cp.id as categoria_produto_id', 'cp.nome as categoria');
    $produtos = $produtos->get();

    return response()->json($produtos);
  }

  public function ofertaProduto($oferta_id)
  {
    $produtos = DB::table('oferta_produtos as op')
                  ->join('produtos as p', 'p.id', 'op.produto_id')
                  ->select('p.id as produto_id','p.nome as produto', 'op.valor as valor', 'op.descricao as descricao')
                  ->where('op.oferta_id', $oferta_id)
                  ->get();
    return response()->json($produtos);
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>