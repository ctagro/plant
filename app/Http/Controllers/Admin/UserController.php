<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    public function finance_menu()
    {
        return view('admin.home.finance_menu');
    }

    public function activity_menu()
    {
        return view('admin.home.activity_menu');
    }

    public function application_menu()
    {
        return view('admin.home.application_menu');
    }

    public function settings_menu()
    {
        return view('admin.home.settings_menu');
    }


    public function profile()
    {
        return view('site.profile.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        
        $data = $request->all();

       // dd($data);

        if($data['password'] != null)
            $data['password'] = bcrypt($data['password']);

        else
            unset($data['password']); // password nao pode ser nulo entao deletamos

        $data['image'] = $user->image;

        // verificando se carregou uma imagem com o hasFile()
        // e se o arquivo é valido com o isValid
        // antes de carregar a imagem

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
          
          //cria um nome para a imagem concatenado id e nome do user
                    $name = 'imagem_user_'.$user->id;   // tirar os espacos com o kebab_case
                    $extenstion = $request->image->extension(); // reguperar a extensao do arquivo de imagem
                    $nameFile = "{$name}.{$extenstion}"; // concatenando
                    $data['image'] = $nameFile;
       


            $upload = $request->file('image')->storeAs('users', $nameFile); // fazendo o upload

                                                // users será o nome da pasta que armazena a imagem

            if (!$upload)
                return redirect() 
                            ->back()
                            ->with('error', 'Falha ao fazer o upload');

        }

        $update = $user->update($data);

        return redirect()
                        ->route('profile')
                        ->with('sucess', 'Sucesso ao atualizar');
                    

        return redirect()
                    ->back()
                    ->with('error',  'Falha ao atualizar o perfil');

    }

    public function list()
    {

        $users = User::all();


    // $users = User::all();

    // dd($users);   

        return view('admin.user.index', ['users' => $users]);
    }

    public function create()
    {



        $user = new \App\User([


        ]);

        return view('admin.user.create',compact('user'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $data = $request->all();

        // dd($data);

        $data['password'] = bcrypt($data['password']);
 
         $data['image'] = $user->image;
 
         // verificando se carregou uma imagem com o hasFile()
         // e se o arquivo é valido com o isValid
         // antes de carregar a imagem
 
         if ($request->hasFile('image') && $request->file('image')->isValid()) {
           
           //cria um nome para a imagem concatenado id e nome do user
                     $name = 'imagem_user_'.$user->id;   // tirar os espacos com o kebab_case
                     $extenstion = $request->image->extension(); // reguperar a extensao do arquivo de imagem
                     $nameFile = "{$name}.{$extenstion}"; // concatenando
                     $data['image'] = $nameFile;
        
 
 
             $upload = $request->file('image')->storeAs('users', $nameFile); // fazendo o upload
 
                                                 // users será o nome da pasta que armazena a imagem
 
             if (!$upload)
                 return redirect() 
                             ->back()
                             ->with('error', 'Falha ao fazer o upload');
 
         }
 
         $user = new User();


 
         $response = $user->storeUser($data);
 
 
         return redirect()
                         ->route('profile')
                         ->with('sucess', 'Sucesso ao atualizar');
                     
 
         return redirect()
                     ->back()
                     ->with('error',  'Falha ao atualizar o perfil');
 
     }
       
     public function show(User $user)
     {
 
         return view('admin.user.show', compact('user' ));
 

     }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {



        return view('admin.user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $dataRequest = $this->validateRequest();
        
        
        if($dataRequest['password'] != null)
        $dataRequest['password'] = bcrypt($dataRequest['password']);

    else
        unset($dataRequest['password']); // password nao pode ser nulo entao deletamos

    $dataRequest['image'] = $user->image;

    // verificando se carregou uma imagem com o hasFile()
    // e se o arquivo é valido com o isValid
    // antes de carregar a imagem

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
      
      //cria um nome para a imagem concatenado id e nome do user
                $name = 'imagem_user_'.$user->id;   // tirar os espacos com o kebab_case
                $extenstion = $request->image->extension(); // reguperar a extensao do arquivo de imagem
                $nameFile = "{$name}.{$extenstion}"; // concatenando
                $data['image'] = $nameFile;
   


        $upload = $request->file('image')->storeAs('users', $nameFile); // fazendo o upload

                                            // users será o nome da pasta que armazena a imagem

        if (!$upload)
            return redirect() 
                        ->back()
                        ->with('error', 'Falha ao fazer o upload');

    }

    $update = $user->update($data);

    return redirect()
                    ->route('profile')
                    ->with('sucess', 'Sucesso ao atualizar');
                

    return redirect()
                ->back()
                ->with('error',  'Falha ao atualizar o perfil');



        $data['name']           = $dataRequest['name'];
        $data['email']          = $dataRequest['email'];
        $data['password']       = $dataRequest['password'];
        $data['image']          = $dataRequest['image'];
        $data['competence_id']  = $dataRequest['competence_id'];
       

        $update = $user -> update($data);

        if ($update)

        return redirect()
                        ->route('user.edit' ,[ 'user' => $user->id ])
                        ->with('sucess', 'Sucesso ao atualizar');
                    

        return redirect()
                    ->back()
                    ->with('error',  'Falha na atualização do cadastro');     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $path = 'users/'.$user['image'];

        if($path != "users/user_avatar.png")

        Storage::delete($path);

        $destroy = $user->delete();

        return redirect('/user');
    }

    private function validateRequest()
    {

        return request()->validate([

            'name'          => 'required',
            'email'         => 'required', 
            'password'      => 'required',
            'image'         => 'required',
            'competence_id' => 'required',
    
       ]);
    }
}
