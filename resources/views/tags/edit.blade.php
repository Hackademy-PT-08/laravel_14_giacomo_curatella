<x-layout>
    <p class="h2 text-center py-5">Modifica nome Tag</p>

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="{{route('tagsUpdate', ['id'=>$tag->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name form-label">Nuovo nome del TAG</label>
                        <input type="text" class="form-control" name="name" value="{{$tag->name}}">
                    </div>

                    <button type="submit" class="mt-5 btn btn-info">Aggiorna</button>
                </form>
            </div>
        </div>
    </section>
</x-layout>