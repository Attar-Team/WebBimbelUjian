@extends('admin.template.template-admin')
@section('content')
{{-- @dd($data) --}}
<div class="container-xxl flex-grow-1 container-p-y">

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ session()->get('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>    
@endif

    <div class="card " >
        <div class="table-responsive text-nowrap p-3">
    <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Soal</th>
            <th>Opsi Jawaban</th>
            <th>Review</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $question)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ strip_tags($question['question']) }}</td>
            <td>
                @foreach ($question->QuestionDetail as $detail)    
                <ul>
                    <li>{{ strip_tags($detail->content_answer) }} <?= $detail->correct_answer === 1 ? "(Jawaban Benar)" : "" ?></li>
                </ul>
                @endforeach
            </td>
            <td>{{ strip_tags($question['review']) }}</td>
            <td >               
              <a class="btn btn-warning mb-2" href="/admin/question/{{ $question['id'] }}/edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
              <form action="/admin/question/delete/{{ $question['id'] }}" method="post">
                @csrf
                <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
          
        </tbody>
       
      </table>
   </div>
   </div>
        
</div>
@endsection
