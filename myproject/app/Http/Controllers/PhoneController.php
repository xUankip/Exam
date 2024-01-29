<?php



namespace App\Http\Controllers;



use App\Models\Phone;

use Illuminate\Http\Request;



class PhoneController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     *@return \Illuminate\Http\Response

     */

    public function index()

    {

        $phones = Phone::latest()->paginate(5);



        return view('phones.index',compact('phones'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('phones.create');

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

            'name' => 'required',

            'detail' => 'required',

        ]);



        Phone::create($request->all());



        return redirect()->route('phones.index')

            ->with('success','Contact created successfully.');

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Phone  $phone

     * @return \Illuminate\Http\Response

     */

    public function show(Phone $phone)

    {

        return view('phones.show',compact('phone'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Phone  $phone

     * @return \Illuminate\Http\Response

     */

    public function edit(Phone $phone)

    {

        return view('phones.edit',compact('phone'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Phone  $phone

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Phone $phone)

    {

        $request->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);



        $phone->update($request->all());



        return redirect()->route('phones.index')

            ->with('success','Contact updated successfully');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Phone  $phone

     * @return \Illuminate\Http\Response

     */

    public function destroy(Phone $phone)

    {

        $phone->delete();



        return redirect()->route('phones.index')

            ->with('success','Contact deleted successfully');

    }

}
