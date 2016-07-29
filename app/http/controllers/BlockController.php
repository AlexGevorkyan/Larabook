<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Topic;
use App\Block;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $block = new Block;
        $topics = Topic::lists('topicname', 'id');
        return view('block.addnew', ['block' => $block , 'topics' => $topics ,
            'page'=>'Add New Block']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //upload processing 
        $name = $request->file('imagepath');
        if($name != null)
        {
            $name = $request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images/', $name);  

        }
     
        //$file = Input::file('imagepath');
        //if($file != null)
        //{
        //        $name = $file->getClientOriginalName();
        //        $file->move(public_path().'/images/', $name);       //сохраняем на диск 
        //}$block = new Block;

        $block = new Block;
        $block->title=$request->title;
        $block->topicid=$request->topicid;
        $block->text=$request->text;
        if($name != null)
            $block->imagepath='/images/'. $name;
        else
            $block->imagepath='';
        $block->position=0;

        if (!$block->save()) 
        {
              $errors = $block->getErrors();
              return redirect()
                ->action('BlockController@create')
                ->with('errors', $errors)
                ->withInput();
        }

        // success!
        return redirect()
          ->action('BlockController@create')
          ->with('message', 'Your block witt id '. $block->id . ' has been created!');
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
}
