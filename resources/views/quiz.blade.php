<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card" >
        <div class="card-body">


       <form action="" method="POST">
                @csrf

            @foreach ($quiz->questions as $question)
                <strong>#{{$loop->iteration}} {{$question->question}}</strong>
                @if($question->image)
                     <img src="{{asset($question->image)}}"  class="img-responsive" width="50%">
                @endif
                {{-- Answer1--}}
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}1"
                       value="answer1" required>
                <label class="form-check-label" for="quiz{{$question->id}}1">
                    {{$question->answer1}}
                </label>
            </div>
            {{-- Answer2--}}
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}2"
                       value="answer2" required >
                <label class="form-check-label" for="quiz{{$question->id}}2">
                    {{$question->answer2}}
                </label>
            </div>
            {{-- Answer3--}}
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}3"
                       value="answer3" required >
                <label class="form-check-label" for="quiz{{$question->id}}3">
                    {{$question->answer3}}
                </label>
            </div>
            {{-- Answer4--}}
            <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}4"
                       value="answer4" required >
                <label class="form-check-label" for="quiz{{$question->id}}4">
                    {{$question->answer4}}
                </label>
            </div>
      
                <hr>

            @endforeach
                <button class="btn btn-success btn-sm btn-block" type="submit">Sınavı Bitir</button>
        </form>


        </div>
    </div>


</x-app-layout>


