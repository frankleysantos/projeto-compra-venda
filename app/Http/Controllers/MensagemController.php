<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Events\ChatMessagemEnviada;
use Auth;
class MensagemController extends Controller 
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
      
      $anuncio = DB::table('ofertas')
                    ->where('user_id', $request->user_logado)
                    ->where('id', $request->oferta_id)
                    ->first();

      $vendedor = DB::table('ofertas')
                    ->where('id', $request->oferta_id)
                    ->first();

      // se vazio  é o comprador
      if (empty($anuncio)) {
        $dados = [
          'recebe_user_id'         => $vendedor->user_id,
          'envia_user_id'  => $request->user_logado,
          'oferta_id'       => $request->oferta_id,
          'descricao'        => $request->descricao,
        ];
      }else{
        $dados = [
          'envia_user_id'         => $vendedor->user_id,
          'recebe_user_id'  => $request->envia_user_id,
          'oferta_id'       => $request->oferta_id,
          'descricao'       => $request->descricao,
        ];
      }

      $mensagem = DB::table('mensagens')->insert($dados);

      $mensagem_user = [
          'envia_user_id'  => $request->envia_user_id,
          'oferta_id'       => $request->oferta_id,
          'descricao'        => $request->descricao,
          'username' => Auth::user()->username,
      ];
      broadcast(new ChatMessagemEnviada($mensagem_user))->toOthers();
      return response()->json($mensagem_user);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Request $request)
  {
    // $oferta_id = $request->oferta_id;

    $mensagens = DB::table('mensagens as msn')
                    ->join('users as u', 'u.id', 'msn.envia_user_id')
                    ->where('oferta_id', $request->oferta_id)
                    ->where('envia_user_id', $request->envia_user_id)
                    // ->orwhere('recebe_user_id', $request->envia_user_id)
                    ->orwhere(function($query) use ($request) {
                      $query->where('recebe_user_id', $request->envia_user_id)
                            ->where('envia_user_id', Auth::user()->id);
                    })
                    ->orderBy('msn.id')
                    ->get();
    // dd($mensagens);
    
     return response()->json($mensagens);
  }

  public function showMessagens(Request $request)
  {
    // $oferta_id = $request->oferta_id;

    $mensagens = DB::table('mensagens')
                    ->where('oferta_id', $request->oferta_id)
                    ->where('envia_user_id', '!=', Auth::user()->id)
                    ->select('envia_user_id')
                    ->groupBy('envia_user_id')
                    ->get();
    $vendedor = DB::table('ofertas')
                    ->where('id', $request->oferta_id)
                    ->first();

    return response()->json(['mensagens' => $mensagens, 'vendedor' => $vendedor]);
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