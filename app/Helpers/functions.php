<?php 

function perfil($user_id) {
    $user = DB::table('users as u')
                ->join('perfil_usuarios as pf', 'pf.user_id', 'u.id')
                ->select(
                    'u.name as name', 'u.username as username', 'u.name as name',
                    'pf.user_id as user_id', 'pf.perfil as perfil', 'pf.status as status'
                )
                ->where('u.id',$user_id)
                ->first();

    return $user;
}
