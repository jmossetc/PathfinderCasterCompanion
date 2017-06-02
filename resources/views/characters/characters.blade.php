@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your characters</div>
                    @foreach($characters as $character)
                        <div class="character">
                            <a href="{{ route('character', $character->id) }}">
                                <span class="character-name">{{$character->name}}</span>
                                <span class="character-classes">
                                    @foreach($character->classes as $class)
                                        {{$class->label . '('.$class->pivot->level.') '}}
                                    @endforeach
                                </span>
                            </a>
                        </div>
                    @endforeach
                    <a href="{{ route('createCharacter') }}">Create new character</a>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
