@extends('Frontend.layouts.master')
@section('page_title')
    Employer Details
@endsection
@section('body_content')
    <div class="container">
        <div class="row">
            @php
            $hirings[] = $boosted[0]; //appending the boosted job to the hiring array
            //dd($hirings);
            $keys = iterator_to_array($hirings); //converting the array to keys

            shuffle($keys); //shuffling the array

            @endphp
            @foreach($keys as $hiring)
            <div class="col-4">
                <div class="card">
                    <img src="https://example.com/image.jpg" class="card-img-top" alt="...">
                    @if($hiring->isBoosted == 'yes')
                    <p>Boosted</p>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $hiring->title }}</h5>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
           
        
    </div>
    </div>
@endsection
