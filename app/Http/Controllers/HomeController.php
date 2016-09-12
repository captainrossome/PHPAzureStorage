<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Home;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$homes = Home::orderBy('EmployeeID', 'desc')->paginate(10);

		return view('homes.index', compact('homes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('homes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$home = new Home();

		$home->FirstName  = $request->input('FirstName');
		$home->LastName   = $request->input('LastName');
		$home->Title 	  = $request->input('Title');
		$home->City 	  = $request->input('City');
		$home->HomePhone  = $request->input('HomePhone');
		
		$home->save();

		return redirect()->route('homes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$home = Home::findOrFail($id);

		return view('homes.show', compact('home'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$home = Home::findOrFail($id);
		
		return view('homes.edit', compact('home'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$home = Home::findOrFail($id);
		$home->EmployeeID = $id;
		$home->FirstName  = $request->input('FirstName');
		$home->LastName   = $request->input('LastName');
		$home->Title 	  = $request->input('Title');
		$home->City 	  = $request->input('City');
		$home->HomePhone  = $request->input('HomePhone');

		$home->save();

		return redirect()->route('homes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$home = Home::findOrFail($id);
		$home->delete();

		return redirect()->route('homes.index')->with('message', 'Item deleted successfully.');
	}

}
