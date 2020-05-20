@extends('layouts.app')
@section('content')
<br><br><br>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Response</h5>
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
            <form method="POST" enctype="multipart/form-data" action="/response">
                @csrf
                <div class="form-group">
                    <label for="companyname">User Id</label>
                    <input type="text" name="user_id" class="form-control" id="companyname" placeholder="User Id">
                </div>
                <div class="form-group">
                    <label for="companyname">Question Id</label>
                    <input type="text" name="question_id" class="form-control" id="companyname"
                        placeholder="Question Id">
                </div>
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
