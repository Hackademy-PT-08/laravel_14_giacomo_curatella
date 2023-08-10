<x-layout>
    <p class="text-center py-5 h2">tutti i <strong class="text-success">MIEI</strong> annunci</p>

    <!-- $pictures -->

    @if(!$pictures->all())
        <p class="text-center text-danger h2 py-5">Spiacente, non abbiamo annunci da mostrarti, torna più tardi!</p>
    @else
        <section class="container py-5">
            <div class="row">
                @foreach ($pictures as $picture)
                    <div class="col-4">
                        <div class="card">
                            <div id="carouselExample-{{$picture->id}}" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach($picture->images as $image)
                                        @if($picture->images[0])
                                            <div class="carousel-item active giacur-carousel" style="background-image: url('{{ asset('storage/' . $image->image) }}');">
                                                <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100 d-none" alt="...">
                                            </div>
                                        @else
                                            <div class="carousel-item giacur-carousel" style="background-image: url('{{ asset('storage/' . $image->image) }}');">
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

                            <div class="card-body">
                                @foreach ($picture->categories as $category)
                                    <p class="badge 
                                        @switch($category->name)
                                            @case('Barche')
                                                bg-primary
                                                @break
                                            @case('Sport e Natura')
                                                bg-success
                                                @break
                                            @case('Giardinaggio')
                                                bg-success
                                                @break
                                            @case('Personale')
                                                bg-warning
                                                @break
                                            @case('Elettronica')
                                                bg-info
                                                @break
                                            @default
                                                bg-secondary
                                        @endswitch
                                    ">{{$category->name}}</p>
                                @endforeach
                            </div>
                            <div class="d-flex gap-1 p-4">
                                @foreach ($picture->tags as $tag)
                                    <p class="small">#{{$tag->name}}</p>
                                @endforeach
                            </div>
                            <div class="card-body">
                                <p class="card-text">€ {{$picture->price}}</p>
                                <h5 class="card-title text-truncate">{{$picture->title}}</h5>
                                <p class="card-text text-truncate">{{ $picture->content }}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('homeDettaglio', ['nome'=>$picture->title, 'id'=>$picture->id]) }}" class="btn btn-primary">Dettalgio articolo</a>
                                    <a href="{{ route('userEdit', ['id'=>$picture->id]) }}" class="btn btn-warning">Modifica</a>
                                    <form action="{{ route('userDeleteArticle', ['id'=>$picture->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</x-layout>