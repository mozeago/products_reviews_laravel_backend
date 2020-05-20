@extends('layouts.app')
@section('content')
<br><br><br>
<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Question</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif
            <form method="POST" enctype="multipart/form-data" action="{{ route('question.update',$question->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="formGroupQuestionTitleInput">Question Title</label>
                    <input type="text" name="title" value="{{ $question->title }}" class="form-control"
                        id="formGroupQuestionTitleInput" placeholder="Question Title" required>
                </div>
                <div class="form-group">
                    <label for="companyname">Company Name</label>
                    <input type="text" name="companyname" value="{{ $question->companyname }}" class="form-control"
                        id="companyname" placeholder="Company Name">
                </div>
                <div class="form-group">
                    @if ($question->companyimage !==null)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        we dont have your company logo yet.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <label for="companylogo">Company Logo (32x32 px)</label>
                    <input type="file" name="companyimage" class="form-control-file" id="companylogo">

                </div>
                <div class="form-group">
                    <label for="modeofresponse">Mode of Response</label>
                    <select class="custom-select mr-sm-2" id="modeofresponse" name="mode_of_response">
                        <option selected>Choose...</option>
                        <option value="Record video" {{ $question->mode_of_response =='Record video'? 'selected':'' }}>
                            Record video
                        </option>
                        <option value="Answer survey questions"
                            {{ $question->mode_of_response =='Answer survey questions'? 'selected':'' }}>Answer survey
                            questions
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="awardamount">Award Amount</label>
                    <input type="text" name="award_amount" value="{{ $question->award_amount }}" class="form-control"
                        id="awardamount" placeholder="Award amount" required>
                </div>
                <div class="form-group">
                    <label for="questionDescriptionTextarea">Question Description</label>
                    <textarea class="form-control" name="description" id="questionDescriptionTextarea"
                        placeholder=" Question description i.e question content."
                        required>{{ $question->description }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
