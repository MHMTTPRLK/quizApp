<x-app-layout>
    <x-slot name="header">{{$question->question}}
        Düzenle</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('questions.update',[$question->quiz_id,$question->id])}}"  enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" class="form-control" rows="4" >{{$question->question}}</textarea>
                </div>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    @if($question->image)
                    <a href="{{asset($question->image)}}" target="_blank">
                        <img src="{{asset($question->image)}}" class="img-responsive" width="200px;">
                    </a>
                    @endif
                    <input  type="file"  name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1.Cevap</label>
                            <textarea name="answer1" class="form-control" rows="2" >{{$question->answer1}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2.Cevap</label>
                            <textarea name="answer2" class="form-control" rows="2" >{{$question->answer2}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3.Cevap</label>
                            <textarea name="answer3" class="form-control" rows="2" >{{$question->answer3}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4.Cevap</label>
                            <textarea name="answer4" class="form-control" rows="2" >{{$question->answer4}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Dogru Cevap</label>
                    <select class="form-control" name="correct_answer">
                        <option @if($question->correct_answer==='answer1') selected @endif value="answer1">1.cevap</option>
                        <option @if($question->correct_answer==='answer2') selected @endif value="answer2">2.cevap</option>
                        <option @if($question->correct_answer==='answer3') selected @endif value="answer3">3.cevap</option>
                        <option @if($question->correct_answer==='answer4') selected @endif value="answer4">4.cevap</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Question  Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

