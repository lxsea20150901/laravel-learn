<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends BaseHomeController{

	/**
	 * PostsController constructor.
	 */
	public function __construct(){
		//		$this->middleware('auth')->except('index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		//
	}

	/**
	 * 发布文章
	 *
	 * @return \Illuminate\Contracts\View\View
	 */
	public function create(){
		return $this->setMeta('发布文章')->fetch('posts.edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){
		$data = $request->validate([
			'title'       => 'required|unique:posts|max:255',
			'keywords'    => 'required|min:3|max:48',
			'description' => 'required|min:15|max:128',
			'content'     => 'required',
		]);
		$data['uid'] = 1;
		Post::create($data);
		return redirect()->route('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Contracts\View\View
	 */
	public function show($id){
		/** @var Post $info */
		$info = Post::findOrFail($id);
		$info->increment('view_count');
		return $this->setMeta($info->title)->fetch('index.info', [
			'info' => $info,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int                      $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){
		//
	}
}
