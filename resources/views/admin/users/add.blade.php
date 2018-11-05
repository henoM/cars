@extends('admin.layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Attach Cars to a User</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => ['admin.car.attach',$id],'class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('name', 'Cars',['class' => 'form-control-label'])!!}
                    </div>
                    <div class="col-12 col-md-9">
                        {!! Form::select('home',$cars, null,['multiple'=>'multiple','name'=>'car[]','class' => 'form-control-sm form-control'])!!}
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection