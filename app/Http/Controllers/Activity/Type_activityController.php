<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Models\Type_activity;

class Type_activityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $type_activities = auth()->user()->type_activity()->get();


        return view('activity.type_activity.index', ['type_activities' => $type_activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $user = auth()->user();
       

        $type_activity = new \App\Models\Type_activity([


        ]);

        return view('activity.type_activity.create',compact('type_activity'));
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
       // dd($request->file('image'));
        //dd($request->file('image'));
        $string = 'true';
        $data['active'] = settype($string, 'boolean');

        $data['user_id'] = auth()->user()->id;

        if ($request->file('image')->isValid()) {
          
            //cria um nome para a imagem concatenado id e nome do user
                $name = 'type_activity_'.time();   // tirar os espacos com o kebab_case
                $extenstion = $request->image->extension(); // reguperar a extensao do arquivo de imagem
                $nameFile = "{$name}.{$extenstion}"; // concatenando
                $data['image'] = $nameFile;
               //dd($data['image']);

               $upload = $request->file('image')->storeAs('type_activities', $nameFile);

            //dd($upload);

            //   $data['image'] = $request->file('image')->storeAs('type_activities', $nameFile); // fazendo o upload
  
             //  dd($name,$nameFile,$data['image']);                                   // users será o nome da pasta que armazena a image
          }


  
      
        //$request['image'] = 'img/logo/mountain.png';
      
        


        // instaciando $despesa com objeto do Model Despesa
      
       // $data = $this->validateRequest();

        //dd($data);

       //dd($data);
        
        $type_activity = new type_activity();

        // Chamando a objeto a funcao do model despesa e passando o array 
        // capiturado no formulario da view financeiro/despesa

        $response = $type_activity->storetype_activity($data);



        if ($response['sucess'])

            return redirect()
                        ->route('type_activity.index')
                        ->with('sucess', $response['mensage']);
                    

        return redirect()
                    ->back()
                    ->with('error', $response['mensage']);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(type_activity $type_activity)
    {

      //  $user_login_id = auth()->user()->id;
      //  $user = auth()->user();
    

        return view('activity.type_activity.show', compact('type_activity' ));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(type_activity $type_activity) {


        $user = auth()->user();


        return view('activity.type_activity.edit',['type_activity' => $type_activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_activity $type_activity)
    {
       //dd($type_activity);
       
       //$data = $type_activity;
       $dataRequest = $request; 

       //dd( $dataRequest['user_id'],$type_activity['image']);

       //dd($data['image'], $request);

       //$data['image'] = $request()->type_activiy()->image;

       //dd($data['image']);

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
          
        //dd($data['image'], 'entrou no if');

        $nameFile = $type_activity['image'];

        $upload = $request->file('image')->storeAs('type_activities', $nameFile);
    }

    $data['description'] = $dataRequest['description'];
    //$data['user_id'] = $dataRequest['user_id'];
    $data['active'] = $dataRequest['active'];
    $data['note'] = $dataRequest['note'];
    $data['image'] = $type_activity['image'];
  

        $type_activity -> update($data);

        return redirect('/type_activity');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(type_activity $type_activity)
    {
         $path = 'type_activities/'.$type_activity['image'];

         //dd($path);
         
         Storage::delete($path);

        $type_activity->delete();
      

        return redirect('/type_activity');
    }

    private function validateRequest()
    {

        return request()->validate([

        
            'description' => 'required',
            'active'=> 'required',
            'note' => 'required',
            'image' => 'requered',
            
            
       ]);


    }
}