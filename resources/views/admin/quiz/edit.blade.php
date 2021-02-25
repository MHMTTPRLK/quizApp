<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <form  method="post" action="{{route('quizzes.update',$quiz->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}" >
                </div>
                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="4" >{{$quiz->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>Quiz Durumu</label>
                    <select class="form-control" name="status">
                        <option @if($quiz->questions_count<4) disabled @endif @if($quiz->status==='publish') selected  @endif value="publish">Aktif</option>
                        <option  @if($quiz->status==='passive') selected @endif value="passive">Pasif</option>
                        <option @if($quiz->status==='draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>
                <div class="form-group">

                    <input id="isFinished"   @if($quiz->finished_at) checked @endif type="checkbox" >
                    <label>Bitiş Tarihi Olacak Mı ?</label>

                </div>
                <div class="form-group" @if(!$quiz->finished_at) style="display:none" @endif   id="finishedInput">
                    <label>Bitiş Tarihi</label>
                    <input  type="datetime-local" name="finished_at" class="form-control"
                        @if($quiz->finished_at)    value="{{date('Y-m-d\TH:i',strtotime($quiz->finished_at)) }}" @endif>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Quiz Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function () {
                if($('#isFinished').is(':checked')){
                    $('#finishedInput').show();
                }else{
                    $('#finishedInput').hide();
                }

            })
        </script>
    </x-slot>
</x-app-layout>
