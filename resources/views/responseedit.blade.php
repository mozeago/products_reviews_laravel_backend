@extends('layouts.app')
@section('content')
<br><br><br>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Response</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
            </div>
            <br />
            @endif
            <form method="POST" enctype="multipart/form-data" action="{{ route('response.update',$response->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="companyname">User Id</label>
                    <input type="text" name="user_id" value="{{ $response->user_id }}" class=" form-control"
                        id="companyname" placeholder="User Id">
                </div>
                <div class="form-group">
                    <label for="companyname">Question Id</label>
                    <input type="text" value="{{ $response->question_id }}" name="question_id" class="form-control"
                        id="companyname" placeholder="Question Id">
                </div>
                @if ($response->video_url !==null)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    we dont have your video response.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="form-group">
                    <label for="companylogo">Video 1 minutes maximum</label>
                    <input type="file" name="video_url" class="form-control-file" id="companylogo">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
