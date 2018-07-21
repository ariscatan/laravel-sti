<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/bootstrap.css" rel="stylesheet" type="text/css"> 
        <!-- Styles -->
        
    </head>
    <body>
<h1>Customers</h1>
<div class="col-md-12">
<form action="<?php echo url('customer/add') ?>" method="POST">
	{{csrf_field()}}
	<div class="form-group">
	<label>Name : <input name="name"/></label>
	<label>Address : <input name="address"/></label>
	<label>Gender : <input name="gender"/>
	<label>Department : <input name="department_id"/>
	</label>
	<input type="submit" value="Submit" />
	</div>
</form>
<table class="table table-striped">
	<thead>
		<thead>Id</thead>
		<thead>Name</thead>
		<thead>Address</thead>
		<thead>Gender</thead>
	</thead>
	<tbody>
		@foreach($customers as $customer)
		<tr>
			<td>
				{{$customer->id}}
			</td>
			<td>
				{{$customer->name}}
			</td>
			<td>
				{{$customer->address}}
			</td>
			<td>
				{{$customer->gender}}
			</td>
			<td>
				<a href="<?php echo url('customer/find/') . '/' . $customer->id ?>">edit</a> 
				<a href="<?php echo url('customer/delete/') . '/' . $customer->id ?>">delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</body>
</html>