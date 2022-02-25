<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class OfertaController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      return view('oferta.index');
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
    // dd($request->all());
    $oferta_id = DB::table('ofertas')->insertGetId([
      'user_id'   => Auth::user()->id,
      'descricao' => $request->descricao
    ]);

    if ($oferta_id) {
      foreach ($request->oferta_produto as $op) {
          DB::table('oferta_produtos')->insert([
            'oferta_id'     => $oferta_id,
            'produto_id'    => $op['produto_id'],
            'valor'         => $op['valor'],
            'descricao'     => $op['descricao'],
            'aceita_oferta' => false
          ]);
      }
    }
    $oferta = [
      'descricao' => $request->descricao,
      'id' => $oferta_id
    ];
    return response()->json($oferta);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show()
  {
      $minhasOfertas = DB::table('ofertas')->get();
      return response()->json($minhasOfertas);
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