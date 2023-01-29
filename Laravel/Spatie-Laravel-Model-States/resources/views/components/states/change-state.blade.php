<div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 text-gray-700 mb-4">
    {!! Form::open(['route' => ['post.state-transit', $post], 'method' => 'PUT']) !!}

    @if ($post->state->canTransitionTo(\App\States\Post\Published::class))
        <button type="submit"
                class="btn btn-success"
                name="action"
                value="published">
            Publish
        </button>
    @endif

    @if ($post->state->canTransitionTo(\App\States\Post\Pending::class))
        <button type="submit"
                class="btn btn-primary"
                name="action"
                value="pending">
            Pending
        </button>
    @endif

    @if ($post->state->canTransitionTo(\App\States\Post\Draft::class))
        <button type="submit"
                class="btn btn-secondary"
                name="action"
                value="draft">
            Draft
        </button>
    @endif
    {!! Form::close() !!}
</div>
