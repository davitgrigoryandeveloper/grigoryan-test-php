<!DOCTYPE html>
<html>
<head>
    <title>Save data in Redis</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<a type="button" href="{{ url('redis-get') }}">See All Keys</a>
<div class="container mt-4">
    @if(session('status') && session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Save data in Redis
        </div>
        <div class="card-body">
            <form name="add-redis-post-form" id="add-redis-post-form" method="post" action="{{url('redis-set')}}">
                @csrf
                <div class="form-group">
                    <label for="key">Key</label>
                    <input type="text" id="key" name="key" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="value">Value</label>
                    <textarea name="value" class="form-control" required=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
