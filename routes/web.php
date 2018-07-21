<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('welcome');
});
Route::get('/customer/index', function () {
    echo 'Customer index';
    $customers = App\Customer::all();
    /*foreach ($customers as $customer) {
    	# code...
    	$department=$customer->department->where('status',1)->first();
    	//dd($department);
    	//dump($customer->name.'-'.$department->name);
    	dump($department->name);
    }*/
    return view('customer.index')->with(['customers'=>$customers]);
});
Route::post('/customer/add', function () {
    echo 'Customer add';
    $customer = new App\Customer;
    $customer->name = $_POST['name'];
    $customer->address = $_POST['address'];
    $customer->gender = $_POST['gender'];
    $customer->department_id = $_POST['department_id'];
    $customer->save();
   	//return URL::redirect('/customer/index');
   	Header('Location:/customer/index');
    //echo 'Saved!';
});

Route::get('/customer/find/{id}', function ($id) {
    echo 'Customer find';
    
    $customer =  App\Customer::find($id);
    dump($customer->name);

});

Route::get('/customer/delete/{id}', function ($id) {
    
    $customer =  App\Customer::find($id);
    $name = $customer->name;
   $customer->delete();
   echo 'Customer delete'.$name;

});
Route::get('/department/index', function () {
    echo 'Department index';
    $departments = App\Department::where('status',1)->get();
    foreach ($departments as $department) {
    	# code...
    	dump($department->name);
    }
});
Route::get('/department/add', function () {
    echo 'Department add';
    $department = new App\Department;
    $department->name = 'Sales';
    $department->save();
    echo 'Saved!';
});
Route::get('/department/find/{id}', function ($id) {
    echo 'Department find';
    
    $department =  App\Department::find($id);
    dump($department->name);

});

Route::get('/department/delete/{id}', function ($id) {
    
    $department =  App\Department::find($id);
    $name = $department->name;
   $department->delete();
   echo 'Department delete'.$name;

});