@extends('posts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <x-flash-message></x-flash-message>
    <x-states.change-state :post="$post"></x-states.change-state>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $post->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $post->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                @if($post->state == 'published')
                    <button class="btn btn-success">
                        {{ $post->state }}
                    </button>
                @elseif($post->state == 'pending')
                    <button class="btn btn-primary">
                        {{ $post->state }}
                    </button>
                @else()
                    <button class="btn btn-secondary">
                        {{ $post->state }}
                    </button>
                @endif
            </div>
        </div>
    </div>
@endsection
