<x-layout>
    <x-slot name="title">Register Page</x-slot>

    <section class="container py-5">
        <div class="row justify-content-center">
            <p class="py-5 text-center"><strong>Crea Account</strong></p>
            <div class="col-12 col-md-6 col-xl-4 border border-1 p-5">
                <form action="/register" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <!-- <div class="mb-3">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="eta" class="form-label">Età</label>
                        <input type="text" name="eta" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Città</label>
                        <input type="text" name="city" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefono</label>
                        <input type="text" name="phone" class="form-control">
                    </div> -->

                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo mail</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Scegli una Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Ripeti Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="mt-5 d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-success">Registrati</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>