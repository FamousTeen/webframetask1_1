@extends('index')

@section('libray-css')

@endsection

@section('content')
<div class="mx-6 my-6">
  <h1 class="text-xl font-semibold mb-3">{{$organizer->name}}</h1>
  <div class="social-links">
    <div class="mb-6">
      <a href="{{ route('organizers.edit', ['organizer' => $organizer->organizer_id])}}"><img width="20" height="20"
          src="https://img.icons8.com/ios/100/FAB005/pencil--v1.png" alt="pencil--v1" /></a>
      <form action="{{ route('organizers.destroy', ['organizer' => $organizer->organizer_id]) }}" method="POST"
        style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">
          <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FA5252/delete--v1.png" alt="delete--v1" />
        </button>
      </form>
    </div>


    <p><strong class="text-xl font-semibold mb-3">Facebook:</strong> <a href="http://m.facebook.com/dummy">{{$organizer->facebook_link}}</a></p>
    <p><strong class="text-xl font-semibold mb-3">X:</strong> <a href="http://x.com/dummy">{{$organizer->x_link}}</a></p>
    <p><strong class="text-xl font-semibold mb-3">Website:</strong> <a href="http://dummy.com">{{$organizer->website_link}}</a></p>
  </div>

  <!-- About Section -->
  <div class="about mt-10">
    <h3 class="text-xl font-bold mb-3">About</h3>
    <p>{{$organizer->description}}</p>
  </div>
</div>


@endsection

@section('library-js')

@endsection