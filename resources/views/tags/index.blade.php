<x-layout>
    <p class="h2 text-center py-5">Lista di tutti i tag presenti nel sito</p>

    <section class="container py-1">
        <div class="row justify-content-center">
            <div class="col-4">
                <a href="{{route('tagsCreate')}}" class="btn btn-primary d-grid">Inserisci NUOVO TAG</a>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <ul style="list-style-type: none;">
                    @foreach ($tags as $tag)
                        <div class="d-flex align-items-center py-2">
                            <strong><li>- {{$tag->name}}</li></strong>
                            @if (auth()->user())
                                <div class="d-flex gap-1 ms-auto">
                                    <a href="{{route('tagsEdit', ['id'=>$tag->id])}}" class="btn btn-primary">Modifica</a>
                                    <form action="{{route('tagsDelete', ['id'=>$tag->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</x-layout>