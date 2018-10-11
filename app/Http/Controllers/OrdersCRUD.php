<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Orders;
use App\Clients;
use App\Services;

class OrdersCRUD extends Controller
{

    public function index()
    {
        $service= Services::with('clients');
        $client = Clients::with('clients');
       //  $order = Orders::with('services');

       // $order = Orders::find(1)->service;
        $order =Orders::orderby('created_at','asc')->paginate(15);

        return view('OrdersCRUD.pages.index')->withOrder($order);
    }
//////////////////////////////////////////////////////////////////////needs EDIT because code based on Client
    public function create()
    {
        return view('OrdersCRUD.pages.create');
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
        $order = new Orders() ;
        $order->date_order = $request->date_order;
        $order->id_service->id=$request->id_service->id;
        $order->id_client->id = $request->id_client->id;
        $order->status = $request->status;
        $order->adress = $request->adress;

        $order-> save();

        //$request->session()->flash('success','Новый заказ успешно добавлен в Базу!');
        return view('OrdersCRUD.pages.show')->withClient($order);

        return redirect()->route('clients-panel.show',$order->id);

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
