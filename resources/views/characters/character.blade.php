@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>{{$character->name}}</h2></div>

                        <h3 class="character-wrapper">

                            <h3>Description</h3>
                            <div id="character-description">
                                {{$character->description}}
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
