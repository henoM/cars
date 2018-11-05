@extends('user.layouts.app')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h4>World</h4>
                        </div>
                        <div class="Vector-map-js" id="cont">
                            <div id="map" class="vmap"></div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <div class="col-lg-2">
                    <table class="table table-striped table-bordered">
                        <thead>

                        <tr>
                            <th scope="col">Cars</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td class="car" id="{{$car->id}}">{{ $car->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $cars->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection