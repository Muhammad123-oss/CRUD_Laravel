<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cars;
use App\Rules\UpperCase;
use App\Http\Requests\CreateValidationRequest;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SELECT * FROM CARS;
        $cars=Cars::all();

        //SELECT * FROM CARS WHERE NAME='TOYOTA';
        // $cars=Cars::where('name','=','toyota')->get();
        
        /*Method will help us to return the first record found from the database and
        it will abort if no record is found in your query.*/
        // $cars=Cars::where('name','=','audi')->firstorfail();

        //To count number of rows in a table
        // $count=Cars::all()->count();

        //To get the sum of a column sum(col_name). Similarly we can also use average and other aggregate functions
        // $col_sum=Cars::sum('founded');

        return view('Cars.index',[
            "cars"=>$cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cars.create');
    }

    /**
     * Store a newly created resource in storage.
     * Whenever we submit a form "store" function of a controller called becuase it has an argument
     * that receive our request.
     */
    // public function store(Request $request)//Use InCase when we validate using validate()
    public function store(CreateValidationRequest $request) //Use InCase when we validate using formRequest
    {
        $request->validated();//Just use $request->validated() to Validate wherever we want to validate
        /** 
         * To Validate fields before entering data to DB.
         * Validation() use to validate fields. If error occur while validating,
         * it thorw an exception and redirects to previous page
         * */  
        // Use InCase when we validate using validate()
        // $request->validate([
        //     // Here we are also applying our own define rule UpperCase
        //     'name'=>['unique:cars','required',new UpperCase],//Here we specify tableName along with unique. We can also set columnName.
        //     'founded'=>'required|integer|min:0|max:2023',//Min and Max means we set minimum and maximum value for founded column
        //     // Here we are also applying our own define rule UpperCase
        //     'description'=>['required',new UpperCase]
        // ]);

        // To insert data into db without "insert" query
        // $cars=new Cars;
        // $cars->name=$request->name;
        // $cars->founded=$request->founded;
        // $cars->description=$request->description;
        // $cars->save();
        
        /**
         * Now Insert Into DB using associate array.
         * Remember in this case we have to set the "fillable" property for our CAR model.
         * Goto Models/Cars.php and set "fillable" property. 
         */

        /**
         * Remember incase of ::create we donot need to write save() to insert data into DB.
         * But incase of ::make we need save() to insert data into DB.
         */
        $car=Cars::create([
            'name'=>$request->input('name'),
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description')
        ]);
        
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cars=Cars::find($id);
        var_dump($cars->products);

        return view('Cars.show')->with('car',$cars);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cars=Cars::find($id)->first();

        //As we have only row so no need to send as an array. That's why i use with() to send data
        return view('Cars.edit')->with('car',$cars);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(CreateValidationRequest $request, string $id)//Use InCase when we validate using formRequest
    {
        // Validating Using FORM REQUEST
        $request->validated();

        $car=Cars::where('id',$id)->update([
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description')
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car=Cars::find($id)->first();
        $car->delete();
        return redirect('/cars');
    }
}
