<x-layouts.app title="Mayoristas">
    <div class="container py-5">
        <h1 class="h2">Mayorista</h1>
        <div class="row">
            <div class="col-4">
              <form action="{{ route('mayoristas.index') }}" method="get">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Buscar mayoristas" name="search" value="{{ $search }}">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                  </button>
                </div>
              </form>
            </div>
            <div class="col-8">
                <a href="{{ route('mayoristas.create') }}" class="btn btn-primary float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                    Nuevo mayorista
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-light border">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">No. Cotizaciones</th>
                        <th scope="col">No. Órdenes</th>
                        <th scope="col">No. Solicitudes</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($wholesalers as $wholesaler)
                    <tr>
                        <th scope="row">{{ $wholesaler->IdUser }}</th>
                        <td>{{ $wholesaler->Name }}</td>
                        <td>{{ $wholesaler->Company }}</td>
                        <td>{{ $wholesaler->Email }}</td>
                        <td>{{ $wholesaler->Phone }}</td>
                        <td>{{ $wholesaler->Discount }}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        {!! $wholesalers->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</x-layouts.app>