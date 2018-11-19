@extends('admin.layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Update</strong> Car
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => ['admin.cars.update', $location->id],'class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('x', 'X',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('x', $location->x, ['class' => 'form-control','style'=> 'width:100px;'])!!}
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
                        {!!  Form::text('y', $location->y, ['class' => 'form-control','style'=> 'width:100px;'])!!}
                        @if ($errors->has('y'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('y') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('update', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection