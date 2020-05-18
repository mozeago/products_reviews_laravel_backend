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
            <form method="POST" enctype="multipart/form-data" action="/question">
                @csrf
                <div class="form-group">
                    <label for="formGroupQuestionTitleInput">Question Title</label>
                    <input type="text" name="title" value="{{ question->title }}" class="form-control"
                        id="formGroupQuestionTitleInput" placeholder="Question Title" required>
                </div>
                <div class="form-group">
                    <label for="companyname">Company Name</label>
                    <input type="text" name="companyname" value="{{ question->companyname }}" class="form-control"
                        id="companyname" placeholder="Company Name">
                </div>
                <div class="form-group">
                    <label for="companylogo">Company Logo (32x32 px)</label>
                    <input type="file" name="companyimage" value="{{ question->companyimage }}"
                        class="form-control-file" id="companylogo">
                </div>
                <div class="form-group">
                    <label for="modeofresponse">Mode of Response</label>
                    <select class="custom-select mr-sm-2" id="modeofresponse" value={{ question->mode_of_response }}
                        name="mode_of_response">
                        <option selected>Choose...</option>
                        <option value="Record video">Record video</option>
                        <option value="Answer survey questions">Answer survey questions</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="awardamount">Award Amount</label>
                    <input type="text" name="award_amount" value="{{ question->award_amount }}" class="form-control"
                        id="awardamount" placeholder="Award amount" required>
                </div>
                <div class="form-group">
                    <label for="questionDescriptionTextarea">Question Description</label>
                    <textarea class="form-control" value="{{ question->description }}" name="description"
                        id="questionDescriptionTextarea" placeholder=" Question description i.e question content."
                        required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
