<x-app-layout>
    <x-slot name="header">{{$quiz->title}} Sonucu</x-slot>

    <div class="card" >
        <div class="card-body">

            <h3>Puan : <strong>{{$quiz->my_result->point}}</strong></h3>
            <div class="alert alert-secondary">
                <span>
                <i class="fa fa-square"></i> İşaretlediğin Şık <br>
                <i class="fa fa-check text-success"></i> Doğru Cevap <br>
                <i class="fa fa-times text-danger"></i> Yanlış Cevap <br>
            </span>
            </div>


                @foreach ($quiz->questions as $question)

                    @if($question->correct_answer == $question->my_answer->answer)
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-times text-danger"></i>
                @endif
                    <strong>#{{$loop->iteration}} </strong>
                {{$question->question}}
                    @if($question->image)
                        <img src="{{asset($question->image)}}"  class="img-responsive" width="50%">
                    @endif
                        <br>
                        <small>Bu Soruya <strong>%{{$question->true_percent}} </strong>Oranında Doğru Cevap Verildi</small>
                    {{-- Answer1--}}
                    <div class="form-check mt-2">
                        @if('answer1' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer1'==$question->my_answer->answer)
                            <i class="fa fa-square "></i>
                        @endif
                        <label class="form-check-label" for="quiz{{$question->id}}1">
                            {{$question->answer1}}

                        </label>
                    </div>
                    {{-- Answer2--}}
                    <div class="form-check">
                        @if('answer2' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer2'==$question->my_answer->answer)
                            <i class="fa  fa-square "></i>
                        @endif
                        <label class="form-check-label" for="quiz{{$question->id}}2">
                            {{$question->answer2}}
                        </label>
                    </div>
                    {{-- Answer3--}}
                    <div class="form-check">
                        @if('answer3' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer3'==$question->my_answer->answer)
                            <i class="fa  fa-square  "></i>
                        @endif
                        <label class="form-check-label" for="quiz{{$question->id}}3">
                            {{$question->answer3}}
                        </label>
                    </div>
                    {{-- Answer4--}}
                    <div class="form-check">
                        @if('answer4' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer4'==$question->my_answer->answer)
                            <i class="fa  fa-square  "></i>
                        @endif
                        <label class="form-check-label" for="quiz{{$question->id}}4">
                            {{$question->answer4}}
                        </label>
                    </div>
                    @if(!$loop->last)
                    <hr>
                    @endif
                @endforeach



        </div>
    </div>


</x-app-layout>



