<x-layout>
    <p class="h2 text-center py-5">Crea Nuovo Tag</p>

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="{{route('tagsStore')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name form-label">Nome del nuovo tag</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <button type="submit" class="mt-5 btn btn-success">Crea</button>
                </form>
            </div>
        </div>
    </section>
</x-layout>