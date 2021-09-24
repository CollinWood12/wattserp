@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update Channel Partner</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
	                <div class="row">
	                	<div class="col-md-12">
	                		<ul class='page_menu'>
	                			<li 
	                				<?php if ($tab == 'channel_partners'){
	                					echo "class='current_tab'";
	                				}?>
	                				><a href="{{ route('channel_partners') }}">Channel Partners</a>
	                			</li>
	                		</ul>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col-md-12">
	                		{!! Form::model($channel_partner, ['method' => 'PATCH', 'route' => array('channel_partners.update', $channel_partner->id)]) !!}
	                		<div class="row">
		                		<div class='col-md-6'>
		                			<div class='form-group'>
		                				{!! Form::hidden('user_id', null, ['id'=>'user_id']) !!}
			                			{!! Form::label('first_name', 'First Name') !!}
			                			{!! Form::text('first_name', null, ['class'=>'form-control']) !!}
			                			{!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('middle_name', 'Middle Name') !!}
		                				{!! Form::text('middle_name', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('last_name', 'Last Name') !!}
		                				{!! Form::text('last_name', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('address', 'Address') !!}
		                				{!! Form::text('address', ( isset($channel_partner->address->first()->address) ? $channel_partner->address->first()->address : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('address', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('city', 'City') !!}
		                				{!! Form::text('city', ( isset($channel_partner->address->first()->city) ? $channel_partner->address->first()->city : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('city', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('state', 'State') !!}
		                				{!! Form::select('state', $states, ( isset($channel_partner->address->first()->state) ? $channel_partner->address->first()->state : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('state', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('zip', 'Zip') !!}
		                				{!! Form::text('zip', ( isset($channel_partner->address->first()->zip) ? $channel_partner->address->first()->zip : null ), ['class'=>'form-control']) !!}
		                				{!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('phone', 'Phone') !!}
		                				{!! Form::text('phone', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
		                				{!! Form::label('alt_email', 'Secondary Email') !!}
		                				{!! Form::text('alt_email', null, ['class'=>'form-control']) !!}
		                				{!! $errors->first('alt_email', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::label('start_date', 'Start Date') !!}
			                			{!! Form::text('start_date', date('m/d/Y', strtotime($channel_partner->start_date)), array('class' => 'datepicker form-control')) !!}
			                			{!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
			                		</div>
			                		<div class='form-group'>
			                			{!! Form::submit('Update Channel Partner', ['class'=>'crm_btn', 'id'=>'submit_form']) !!}
			                			<a class='crm_btn2' href='{{ route('channel_partners.index') }}'>Cancel</a>
			                		</div>
			                	</div>
		                	</div>
		                	{!! Form::close() !!}
	                	</div>
	                </div>
	        	</div>
            </div>
        </div>
    </div>
</div>
@endsection
