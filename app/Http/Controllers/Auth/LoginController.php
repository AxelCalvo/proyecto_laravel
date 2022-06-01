<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite; 


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use AuthenticatesUsers;
   
    public function index()
    {
        return view('auth/login');
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
/**
*Redirecciona al usuario a la página de Facebook para autenticarse
*
*@return \Illuminate\Http\Response
*/
public function redirectToFacebookProvider()
{
return Socialite::driver('facebook')->redirect();
}

/**
*Obtiene la información de Facebook
*
*@return \Illuminate\Http\RedirectResponse
*/
public function handleProviderFacebookCallback()
{

    $auth_user = Socialite::driver('facebook')->user(); 
    return redirect("/candidato");
// Fetch authenticated user dd($auth_user);
}

public function logout(Request $request){

   
    \Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect("login");
}

}
    

