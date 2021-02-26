<x-app-layout>
    <x-slot name="header">

        Anasayfa

    </x-slot>
  <div class="row">
      <div class="col-md-8">
          <div class="list-group">
              @foreach($quizzes as $quiz)
              <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                  <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{$quiz->title}}</h5>
                      <small>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans()." bitiyor": null}}</small>
                  </div>
                  <p class="mb-1">{{Str::limit($quiz->description)}}</p>
                  <small>{{$quiz->questions_count}} soru</small>
              </a>
              @endforeach
             <div class="mt-2"> {{$quizzes->links()}}</div>
          </div>
      </div>
      <div class="col-md-4">
          deneme
      </div>
  </div>
  <!--  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="alert alert-danger">Bootstrap Alert Mesajı</div>

             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-jet-welcome />
            </div>

        </div>
    </div>-->

</x-app-layout>
