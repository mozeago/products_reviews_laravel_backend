@extends('layouts.app')
@section('content')
<br><br><br>
<div>
    <div class="card">
  <div class="card-body">
      <h5 class="card-title">Add Question</h5>
<form method="POST" enctype="multipart/form-data" action="/question">
    @csrf
  <div class="form-group">
    <label for="formGroupQuestionTitleInput">Question Title</label>
    <input type="text" name="title" class="form-control" id="formGroupQuestionTitleInput" placeholder="Question Title" required>
  </div>
  <div class="form-group">
    <label for="companyname">Company Name</label>
    <input type="text" name="companyname" class="form-control" id="companyname" placeholder="Company Name">
  </div>
  <div class="form-group">
    <label for="companylogo">Company Logo (32x32 px)</label>
    <input type="file" name="companyimage" class="form-control-file" id="companylogo">
  </div>
  <div class="form-group">
  <label for="modeofresponse">Mode of Response</label>
      <select class="custom-select mr-sm-2" id="modeofresponse">
        <option selected>Choose...</option>
        <option value="Record video">Record video</option>
        <option value="Answer survey questions">Answer survey questions</option>
      </select>
  </div>
  <div class="form-group">
    <label for="awardamount">Award Amount</label>
    <input type="text" name="awardamount" class="form-control" id="awardamount" placeholder="Award amount" required>
  </div>
   <div class="form-group">
       <label for="questionDescriptionTextarea">Question Description</label>
    <textarea class="form-control" name="description" id="questionDescriptionTextarea" placeholder=" Question description i.e question content." required></textarea>
   </div>
   <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>
  </div>
    </div>
</div>
<br>
<br>
 <div class="table-responsive">
     <h5 class="title">Question in Database</h5>
     <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
 </div>
@endsection
