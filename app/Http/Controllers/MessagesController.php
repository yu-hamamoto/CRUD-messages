<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::all();
        
        return view('messages.index',[
            'messages'=>$messages,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message=new Message;
        
        return view('messages.create',[
            'message'=>$message,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:191',
            'content'=>'required|max:255',
            'status'=>'required|max:10',
            ]);
        
        $message=new Message;
        $message->title=$request->title;
        $message->content=$request->content;
        $message->status=$request->status;
        $message->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=Message::findOrfail($id);
        
        return view('messages.show',[
            'message'=>$message,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message=Message::findOrfail($id);
        
        return view('messages.edit',[
            'message'=>$message,
            ]);
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
        $request->validate([
            'title'=>'required|max:191',
            'content'=>'required|max:255',
            'status'=>'required|max:10',
            ]);
            
        $message=Message::findOrfail($id);
        $message->title=$request->title;
        $message->content=$request->content;
        $message->status=$request->status;
        $message->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=Message::findOrfail($id);
        
        $message->delete();
        
        return redirect('/');
    }
}