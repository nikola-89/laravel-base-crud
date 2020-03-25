<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SerieController extends Controller
{
	private $validationData = [
		'content_id' => 'required|string|max:255',
		'distributor' => 'required|string|max:30',
		'title' => 'required|string|max:100',
		'synopsis' => 'string|max:2000',
		'year' => 'required|numeric|min:1900|max:2099',
		'season' => 'required|numeric|min:1|max:99',
	];
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$series = Serie::all();
		return view('series.index', compact('series'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('series.create');
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
		$request->validate($this->validationData);
		$serieToAdd = new Serie;
		$serieToAdd->fill($data);
		$save = $serieToAdd->save();
		if ($save) {
			$serie = Serie::all()->last();
			return redirect()->route('series.show', compact('serie'));
		} 
		return back()->withInput();
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Serie $serie)
	{
		if (empty($serie)) {
			abort('404');
		}
		return view('series.show', compact('serie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Serie $serie)
	{
		if (empty($serie)) {
			abort('404');
		}
		return view('series.create', compact('serie'));
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
		$serie = Serie::find($id);
		if (empty($serie)) {
			abort('404');
		}
		$data = $request->all();
		$request->validate($this->validationData);
		$updated = $serie->update($data);
		if ($updated) {
			$serie = Serie::find($id);
			return redirect()->route('series.show', compact('serie'));
		}
		abort('404');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Serie $serie)
	{
		$id = $serie->id;
		$serie->delete();
		$data = [
			'id' => $id,
			'series' => Serie::all(),
		];
		return view('series.index', $data);
	}
}
