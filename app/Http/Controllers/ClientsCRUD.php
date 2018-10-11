<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use Symfony\Component\HttpKernel\Client;

class ClientsCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Clients::orderby('created_at', 'asc')->paginate(10);
        return view('ClientsCRUD.pages.index')->withClient($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('ClientsCRUD.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Привести в соответствие валидацию - а именно значение переменных узнать как правильно присвоить
           $request->validate([

           'name' => 'required|max:50|unique:clients,name',
            'OKPO' => 'required|max:10|numeric|min:8|unique:clients,OKPO',
            'contact_name' => 'required|max:255',
            'contact_phone' => 'required|numeric|min:6|max:255',
            'adress' => 'required|max:255',

        ]);
*/
        $client = new Clients() ;
        $client->name = $request->name;
        $client->OKPO =$request->OKPO;
        $client->contact_name = $request->contact_name;
        $client->contact_phone = $request->contact_phone;
        $client->adress = $request->adress;

        $client-> save();

        //$request->session()->flash('success','Новый клиент успешно добавлен в Базу!');
        return view('ClientsCRUD.pages.show')->withClient($client);

        return redirect()->route('clients-panel.show',$client->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $client= Clients::find($id);
       return view('ClientsCRUD.pages.show')->withClient($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client= Clients::find($id);
        return view('ClientsCRUD.pages.edit')->withClient($client);
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
        $client = Clients::find($id) ;
        $client->name = $request->name;
        $client->OKPO =$request->OKPO;
        $client->contact_name = $request->contact_name;
        $client->contact_phone = $request->contact_phone;
        $client->adress = $request->adress;

        $client-> save();

        //$request->session()->flash('success','Клиент успешно обновлен в Базе!');
        return view('ClientsCRUD.pages.show')->withClient($client);

        return redirect()->route('clients-panel.show',$client->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Clients::find($id);
            $client->delete();

        //return view('ClientsCRUD.pages.index');
        return redirect()->route('clients-panel.index');
    }
}
