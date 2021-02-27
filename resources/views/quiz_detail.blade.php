<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card" >
        <div class="card-body">
            <p class="card-text">

                 <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quiz->my_results)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                         Puan
                            <span  class="badge badge-primary badge-pill">{{$quiz->my_result->point}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Doğru / Yanlış Sayısı
                            <div class="float-right">
                                <span  class="badge badge-success badge-pill">{{$quiz->my_result->correct}} Doğru</span>
                                <span  class="badge badge-danger badge-pill">{{$quiz->my_result->wrong}} Yanlış</span>
                            </div>

                        </li>
                        @endif
                        @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Son Katılım Tarihi
                            <span title="{{$quiz->finished_at}}" class="badge badge-secondary badge-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif
                        @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Soru  Sayısı
                            <span class="badge badge-secondary badge-pill">{{$quiz->questions_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı Sayısı
                            <span class="badge badge-warning badge-pill">{{$quiz->details['join_count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Ortalama Puan
                            <span class="badge badge-light badge-pill">{{$quiz->details['avarage']}}</span>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-8">
            {{$quiz->description}}</p>
            @if($quiz->my_result)
            <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-warning btn-block btn-sm ">Quiz'i Görüntüle</a>

            @else
                <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm ">Quiz'e Katıl</a>
            @endif
                </div>

            </div>


        </div>
    </div>

</x-app-layout>


