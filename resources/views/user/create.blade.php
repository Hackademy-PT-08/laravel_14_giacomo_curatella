<x-layout>
    <p class="h2 text-center py-5">Inserisci annuncio</p>

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{route('userCreateStore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="images" class="form-label">Carica le tue immagini</label>
                        <input type="file" name="images[]" class="form-control shadow" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo dell'articolo</label>
                        <input type="text" name="title" class="form-control shadow">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Descrizione dell'articolo</label>
                        <textarea name="content" id="content" cols="30" rows="10" style="resize: none;" class="form-control shadow"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="categories" class="form-label">Categorie Dell'articolo</label>
                        <select class="form-select shadow" name="categories[]" aria-label="Default select example" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags Dell'articolo</label>
                        <select class="form-select shadow" name="tags[]" aria-label="Default select example" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo dell'articolo</label>
                        <input type="number" name="price" class="form-control shadow">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-success">Crea Annuncio</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>