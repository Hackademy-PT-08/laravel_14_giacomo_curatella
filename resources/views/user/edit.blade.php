<x-layout>
    <p class="h2 text-center py-5">Modifica annuncio</p>

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{route('userEditSubmit', ['id'=>$picture->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="row gap-2 px-3">
                            <p class="text-center small">Le foto dell'articolo</p>
                            <p class="text-center text-danger small"><strong>Attenzione:</strong> caricando nuove <span class="text-decoration-underline">FOTO</span> eliminerai le precedenti!</p>
                            @foreach ($picture->images as $image)
                                <div class="col-2 d-flex justify-content-around gap-2 giacur-carousel-edit rounded-2" style="background-image: url('{{asset('storage/' . $image->image)}}');">
                                </div>
                               
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Carica le tue immagini</label>
                        <input type="file" name="images[]" class="form-control shadow" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo dell'articolo</label>
                        <input type="text" name="title" class="form-control shadow" value="{{$picture->title}}">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Descrizione dell'articolo</label>
                        <textarea name="content" id="content" cols="30" rows="10" style="resize: none;" class="form-control shadow">{{$picture->content}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="categories" class="form-label">Categorie Dell'articolo</label>
                        <select class="form-select shadow" name="categories[]" aria-label="Default select example" multiple>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ ($picture->categories->contains($category->id)) ? 'selected' : '' }}>{{ $category->name  }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags Dell'articolo</label>
                        <select class="form-select shadow" name="tags[]" aria-label="Default select example" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}" {{ ($picture->tags->contains($tag->id)) ? 'selected' : '' }}>{{ $tag->name  }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo dell'articolo</label>
                        <input type="number" name="price" class="form-control shadow" value="{{$picture->price}}">
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-info">Aggiorna Annuncio</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>