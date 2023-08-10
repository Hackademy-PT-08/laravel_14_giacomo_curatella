<x-layout>
    <x-slot name="title">Login page</x-slot>

    <section class="container py-5">
        <div class="row justify-content-center">
            <p class="py-5 text-center"><strong>Effettua l'accesso</strong></p>
            <div class="col-12 col-md-6 col-xl-4 border border-1 p-5">
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo mail</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mt-5 d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>