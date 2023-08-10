<x-layout>
    <p class="h2 text-center py-5">{{$picture->title}} € {{$picture->price}}</p>

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div id="carouselExample-{{$picture->id}}" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($picture->images as $image)
                            @if($picture->images[0])
                                <div class="carousel-item active giacur-carousel-show" style="background-image: url('{{ asset('storage/' . $image->image) }}');">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100 d-none" alt="...">
                                </div>
                            @else
                                <div class="carousel-item giacur-carousel-show" style="background-image: url('{{ asset('storage/' . $image->image) }}');">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100 d-none" alt="...">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample-{{$picture->id}}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample-{{$picture->id}}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row py-5">
            <div class="col-12 d-flex flex-column align-items-center">
                <p class="h4">{{ $picture->title }}</p>
                <p>{{ $picture->content }}</p>
            </div>

            <div class="col-12 d-flex justify-content-center mt-5">
                @if(!auth()->user())
                    <a href="{{ route('home') }}" class="btn btn-info">Torna alla HomePage</a>
                @else
                    <a href="{{ route('userHome') }}" class="btn btn-info">Torna alla HomePage</a>
                @endif
            </div>
        </div>
    </section>
</x-layout>