@extends('admin.layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong> Car
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'admin.car.store','class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('name', 'Car Name',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('name', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('name'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('name') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('x', 'X',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('x', null, ['class' => 'form-control','style'=> 'width:100px;'])!!}
                        @if ($errors->has('x'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('x') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('y', 'Y',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('y', null, ['class' => 'form-control','style'=> 'width:100px;'])!!}
                        @if ($errors->has('y'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('y') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>

@endsection