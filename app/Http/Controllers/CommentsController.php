<?php

namespace App\Http\Controllers;

use App\Comments;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Comments::all(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $comments = Comments::find($id);
        if(is_null($comments)){
            return response()->json(["message"=>"Recode not found!"],404);
        }
        return response()->json(Comments::find($id),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id'=>'required',
            'subject'=>'required|min:2|max:50',
            'contents'=>'required|min:2',
        ];


        $validator = validator()->make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(["message"=>$validator->errors()],400);
        }
        // $comment =Comment::create($request->all());
        $comment = new Comments;
        $comment->user_id = $request->user_id;
        $comment->subject = $request->subject;
        $comment->contents = $request->contents;
        $comment->save();
        return response()->json($comment,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $comments = Comments::find($id);
        if(is_null($comments)){
            return response()->json(["message"=>"Recode not found!"],404);
        }
        $comments->update($request->only(['subject','contents']));
        return response()->json($comments,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comments::find($id);
        if(is_null($comments)){
            return response()->json(["message"=>"Recode not found!"],404);
        }

        $comments->delete();
        return response()->json(null,204);
    }
}
