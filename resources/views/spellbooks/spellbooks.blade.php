@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your characters</div>

                    @foreach($spellbooks as $spellbook)
                        <div class="spellbook">
                            <a href="{{ route('spellbook', $spellbook->id) }}">
                                <span class="spellbook-name">{{$spellbook->name}}</span>
                            </a>
                        </div>
                    @endforeach

                    <a href="{{ route('createSpellbook') }}">Create new spellbook</a>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
