<x-app-layout>
    <x-slot name="header">

        {{$quizzes->title}}
        Quizine Ait Sorular

    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('questions.create',$quizzes->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Soru Oluştur</a>
            </h5>
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th scope="col">Soru</th>
                    <th scope="col">Fotoğraf</th>
                    <th scope="col">1.Cevap</th>
                    <th scope="col">2.Cevap</th>
                    <th scope="col">3.Cevap</th>
                    <th scope="col">4.Cevap</th>
                    <th scope="col">Doğru Cevap</th>
                    <th scope="col" style="width:100px;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>
                            @if($question->image)
                                <a href="{{asset($question->image)}}" target="_blank">
                                    <img src="{{asset($question->image)}}" class="img-responsive" width="200px;">
                                </a>
                            @else
                                <a href="{{asset("images/not-image.png")}}" target="_blank">
                                    <img src="{{asset("images/not-image.png")}}" class="img-responsive" width="200px;">
                                </a>
                            @endif

                            </td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td class="text-success">{{substr($question->correct_answer,-1)}}.Cevap</td>
                        <td>

                            <a href="{{route('questions.edit',[$quizzes->id,$question->id])}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i> </a>
                            <a href="{{route('questions.destroy',[$quizzes->id,$question->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>

