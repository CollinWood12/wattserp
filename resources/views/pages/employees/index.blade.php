@extends('layouts.employees')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Employees</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					
					@if (Auth::user()->hasPermission('create_employee'))
            			<a class='crm_btn2 right_side' href="{{ route('employees.create' )}}">Create New Employee</a>
            		@endif
	                		
                    <div class="row">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'employees'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('employees') }}">Employees</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		@if(Session::has('created_employee'))
	                			<p class='bg_success'>{{ Session('created_employee') }}</p>
	                		@endif
	                		<table class='table'>
	                			<thead>
	                				<tr>
	                					@if (Auth::user()->hasPermission('view_employee_admin'))
	                					<th>ID</th>
	                					@endif
	                					<th>First Name</th>
	                					<th>Last Name</th>
	                					<th>Phone</th>
	                					<th>Email</th>
	                					@if (Auth::user()->hasPermission('view_employee_admin'))
	                					<th>Created At</th>
	                					<th>Update At</th>
	                					@endif
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<?php $curr_email = ""; ?>
	                				@if ($employees)
	                					@foreach($employees as $employee)
	                						@foreach($users as $user)
	                							@if ($employee->user_id == $user->id)
	                								<?php $curr_email = $user->email; ?>
	                							@endif
	                						@endforeach
	                						<tr>
	                							@if (Auth::user()->hasPermission('view_employee_admin'))
	                							<td> {{ $employee->id }} </td>
	                							@endif
	                							<td>
	                								@if (Auth::user()->hasPermission('view_employee_basic'))
	                								<a href="{{ route('employees.employee', $employee->id) }}"> 
	                								@endif
	                								{{ $employee->first_name }}
	                								@if (Auth::user()->hasPermission('view_employee_basic'))
	                								</a>
	                								@endif
	                							</td>
	                							<td>
	                								@if (Auth::user()->hasPermission('view_employee_basic'))
	                								<a href="{{ route('employees.employee', $employee->id) }}">
	                								@endif
	                								{{ $employee->last_name }}
	                								@if (Auth::user()->hasPermission('view_employee_basic'))
	                								</a>
	                								@endif
	                							</td>
	                							<td>
	                								<a href='tel:{{ $employee->phone }}'>
	                									<span class='phone'> {{ $employee->phone }} </span>
	                								</a>
	                							</td>
	                							<td><a href='mailto: {{ $curr_email }}'>{{ $curr_email }}</a></td>
	                							@if (Auth::user()->hasPermission('view_employee_admin'))
	                							<td>{{ $employee->created_at->diffForHumans() }}</td>
	                							<td>{{ $employee->updated_at->diffForHumans() }}</td>
	                							@endif
	                						</tr>
	                					@endforeach
	                				@endif
	                				{{ $employees->links() }}
	                			</tbody>
	                		</table>
	                		@if (!$employees->count())
        						<div style='padding-left: 5px;'>No Results to Display</div>
        					@endif
	                		<hr />
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
