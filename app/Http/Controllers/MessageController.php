<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\Messages\MessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = allQueryFormat( $request->filter );

        $messages = Message::where('message', 'LIKE', $filter )->paginate(10);

        $request->flash();
        
        return view('messages.index', ['messages' => $messages ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::list();
        return view('messages.create', [ 'locations' => $locations] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $message = new Message;

        $message->saveOrUpdate( $request->all() );

        $request->session()->flash('status', __('messages.saved_ok'));

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $locations = Location::list();
        return view('messages.edit', [ 'message' => $message, 'locations' => $locations] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    /**
     * Send a sms message 
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request, $phone, $message, $location, $token)
    {

        if( $token == config('app.SMS_TOKEN') ){
            
            $message = Message::create($phone, $message, $location);

            return $message;    
        }
    }



}
