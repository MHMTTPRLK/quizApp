<x-app-layout>
    <x-slot name="header">{{$quiz->title}}
        Quizine Ait Sorular</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('questions.store',$quiz->id)}}" enctype="multipart" >
                @csrf
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" class="form-control" rows="4" value="{{old('question')}}"></textarea>
                </div>
                <div class="form-group">
                    <label>Fotoğraf</label>
                    <input  type="file"  name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1.Cevap</label>
                            <textarea name="answer1" class="form-control" rows="2" value="{{old('answer1')}}"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2.Cevap</label>
                            <textarea name="answer2" class="form-control" rows="2" value="{{old('answer2')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3.Cevap</label>
                            <textarea name="answer3" class="form-control" rows="2" value="{{old('answer3')}}"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4.Cevap</label>
                            <textarea name="answer4" class="form-control" rows="2" value="{{old('answer4')}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Dogru Cevap</label>
                    <select class="form-control" name="correct_answeer">
                        <option value="answer1">1.cevap</option>
                        <option value="answer2">2.cevap</option>
                        <option value="answer3">3.cevap</option>
                        <option value="answer4">4.cevap</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Question  Oluştur</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

