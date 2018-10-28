@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form action="{{ route('advertisements.store') }}" method="post">
                @method('post')
                @csrf

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-primary">Create</button>
            </form>
        </div>

        <br>

        @if(!$advertisements->isEmpty())
            <div class="row">
                @foreach($advertisements as $advertisement)
                    <div class="col-lg-6 col-md-6">
                        <h2>{{ $advertisement->title }}</h2>
                        <div class="small">Author:  {{ $advertisement->getUserName() }} Date: {{ $advertisement->created_at->format("Y-m-d") }}</div>
                        <p>
                            {{ str_limit($advertisement->description, 300) }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning">Oops, advertisements not found.</div>
        @endif
    </div>
@endsection
