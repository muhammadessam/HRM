<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
class PositionController extends Controller
{
  /**
   * Display a listing of Position.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $position = Position::all();

      return view('admin.position.index', compact('position'));
  }

  /**
   * Show the form for creating new Position.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

      return view('admin.position.create');
  }

  /**
   * Store a newly created Position in storage.
   *
   * @param \App\Http\Requests\StorepositionRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

        $rules = [
          'title' => 'required|string|max:100',
          'lat' => 'required',
          'lng' => 'required',
        ];
        $data = $this->validate(request(), $rules, [], [
          'title' => 'العنوان',
          'lat' => 'الطول',
          'lng' => 'العرض',
        ]);
        Position::create($data);
      return redirect('admin/position/create')->with('success', 'تم حفظ المعطيات بنجاح');
  }


  /**
   * Show the form for editing Position.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $position = Position::findOrFail($id);

      return view('admin.position.edit', compact('position'));
  }

  /**
   * Update Position in storage.
   *
   * @param \App\Http\Requests\UpdatepositionRequest $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

      $Position = Position::findOrFail($id);


      $rules = [
        'title' => 'required|string|max:100',
        'lat' => 'required',
        'lng' => 'required',
      ];
      $data = $this->validate(request(), $rules, [], [
        'title' => 'العنوان',
        'lat' => 'الطول',
        'lng' => 'العرض',
      ]);
      $Position->update($data);
      return redirect()->route('admin.position.index');
  }


  /**
   * Display Position.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $Position = Position::findOrFail($id);

      return view('admin.position.show', compact('Position'));
  }


  /**
   * Remove Position from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {

      $Position = Position::findOrFail($id);
      $Position->delete();

      return redirect('admin/position');
  }
}
