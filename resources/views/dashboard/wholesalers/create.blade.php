<x-layouts.app title="Nuevo mayorista">
    <div class="container py-5" id="app">
        <div class="row mb-2">
            <div class="col-4">
                <h1 class="h2">Nuevo mayorista</h1>
            </div>
            <div class="col-8">
                <div class="btn.group"></div>
                <a href="{{ route('mayoristas.index') }}" class="btn btn-danger float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                    Cancelar
                </a>
                <button type="button" class="btn btn-primary float-end me-2"
                    onclick="event.preventDefault(); document.getElementById('frm').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-save" viewBox="0 0 16 16">
                        <path
                            d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                    </svg>
                    Crear mayorista
                </button>
            </div>
        </div>
        <form action="{{ route('mayoristas.store') }}" method="POST" id="frm">
            @csrf
            <div class="card mb-3 p-4">
                <div class="card-body">
                    <h5 class="card-title">Información del mayorista</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="Name"
                                    placeholder="Excribe el nombre del mayorista" value="{{ old('Name') }}">
                                @error('Name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electronico <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="Email"
                                    placeholder="juan@correo.com" value="{{ old('Email') }}">
                                @error('Email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Porcentaje de descuento</label>
                                <input type="text" class="form-control" id="discount" name="Discount"
                                    placeholder="15%" value="{{ old('Discount') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="company" class="form-label">Empresa <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company" name="Company"
                                    placeholder="Excribe el nombre de la empresa" value="{{ old('Company') }}">
                                @error('Company')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Numero de telefono <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="Phone"
                                    placeholder="333-333-3333" value="{{ old('Phone') }}">
                                @error('Phone')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 p-4">
                <div class="card-body">
                    <h5 class="card-title">Dirección de envío</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="contactName" class="form-label">Nombre de contacto</label>
                                <input type="text" class="form-control" id="contactName" name="ContactName"
                                    placeholder="Excribe el nombre de contacto" v-model="addressData.name">
                            </div>
                            <div class="mb-3">
                                <label for="postalCode" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="postalCode" name="PostalCode"
                                    placeholder="Escribe el código postal" v-model="addressData.postalCode"
                                    @change="searchPostalCode()">
                                @error('PostalCode')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ciudad</label>
                                <select class="form-select" name="City" v-model="addressData.city" @change="searchColonyByTown()">
                                    <option value="0" selected>Selecciona la ciudad</option>
                                    <option v-for="town in addressData.towns" :value="town.CMunicipio">@{{ town.Descripcion }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address_email" class="form-label">Correo electronico</label>
                                <input type="email" class="form-control" id="address_email" name="address_email"
                                    placeholder="juan@correo.com" v-model="addressData.email">
                                @error('address_email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="address" name="Address"
                                    placeholder="Ingresa la dirección" v-model="addressData.address">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Estado</label>
                              <select class="form-select" name="State" v-model="addressData.state" v-bind="addressData.state" @change="searchTownByState()">
                                <option value="0" selected>Selecciona el estado</option>
                                @foreach ($states as $state)
                                <option value="{{ $state->CEstado }}">{{ $state->NombreEstado }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Colonia</label>
                                <select class="form-select" name="Neighborhood" v-model="addressData.neighborhood">
                                    <option value="0" selected>Selecciona la colonia</option>
                                    <option v-for="neighborhood in addressData.neighborhoods" :value="neighborhood.CColonia">@{{ neighborhood.CNombreAsentamiento }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address_phone" class="form-label">Teléfono <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address_phone" name="address_phone"
                                    placeholder="333-333-3333" v-model="addressData.phone">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Dirección de facturación</h5>
                        </div>
                        <div class="col">
                            <h5 class="card-title float-end">
                                <input class="form-check-input" type="checkbox" name="user_address" @click="getAddressData($event)">
                                Usar dirección de envío
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="billing_contactName" class="form-label">Nombre de contacto</label>
                                <input type="text" class="form-control" id="billing_contactName"
                                    name="billing_ContactName" placeholder="Excribe el nombre de contacto"
                                    v-model="billingData.name">
                            </div>
                            <div class="mb-3">
                                <label for="billing_postalCode" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="billing_postalCode"
                                    name="billing_PostalCode" placeholder="Escribe el código postal"
                                    v-model="billingData.postalCode" @change="searchPostalCode(true)">
                                @error('billing_PostalCode')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ciudad</label>
                                <select class="form-select" name="billing_City" v-model="billingData.city" @change="searchColonyByTown(true)">
                                    <option value="0" selected>Selecciona la ciudad</option>
                                    <option v-for="town in billingData.towns" :value="town.CMunicipio">@{{ town.Descripcion }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="billing_address_email" class="form-label">Correo electronico</label>
                                <input type="email" class="form-control" id="billing_address_email"
                                    name="billing_address_email" placeholder="juan@correo.com"
                                    v-model="billingData.email">
                                @error('billing_address_email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="billing_address" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="billing_address"
                                    name="billing_Address" placeholder="Ingresa la dirección"
                                    v-model="billingData.address">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="billing_State" v-model="billingData.state" @change="searchTownByState(true)">
                                    <option value="0" selected>Selecciona el estado</option>
                                    @foreach ($states as $state)
                                <option value="{{ $state->CEstado }}">{{ $state->NombreEstado }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Colonia</label>
                                <select class="form-select" name="billing_Neighborhood"
                                    v-model="billingData.neighborhood">
                                    <option value="0" selected>Selecciona la colonia</option>
                                    <option v-for="neighborhood in billingData.neighborhoods" :value="neighborhood.CColonia">@{{ neighborhood.CNombreAsentamiento }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="billing_address_phone" class="form-label">Teléfono <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="billing_address_phone"
                                    name="billing_address_phone" placeholder="333-333-3333"
                                    v-model="billingData.phone">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 p-4">
                <div class="card-body">
                    <h5 class="card-title">Datos de facturación</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="BusinessName" class="form-label">Razón social</label>
                                <input type="text" class="form-control" id="BusinessName" name="BusinessName"
                                    placeholder="Excribe la razón social" value="{{ old('BusinessName') }}">
                            </div>
                            <div class="mb-3">
                                <label for="rfc" class="form-label">RFC</label>
                                <input type="text" class="form-control" id="rfc" name="Rfc"
                                    placeholder="Escribe el RFC" value="{{ old('Rfc') }}">
                                @error('Rfc')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Cfdi" class="form-label">Uso de CFDI</label>
                                <input type="text" class="form-control" id="Cfdi" name="Cfdi"
                                    placeholder="Ingresa el CFDI" value="{{ old('Cfdi') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            const {
                createApp
            } = Vue

            createApp({
                data() {
                    return {
                        message: 'Hello Vue!',
                        addressData: {
                            name: '{{ old('ContactName') }}',
                            postalCode: '{{ old('PostalCode') }}',
                            city: 0,
                            email: '{{ old('address_email') }}',
                            address: '{{ old('Address') }}',
                            neighborhood: 0,
                            state: 0,
                            phone: '{{ old('address_phone') }}',
                            towns: [],
                            neighborhoods: []
                        },
                        billingData: {
                            name: '{{ old('billing_ContactName') }}',
                            postalCode: '{{ old('billing_PostalCode') }}',
                            city: 0,
                            email: '{{ old('billing_address_email') }}',
                            address: '{{ old('billing_Address') }}',
                            neighborhood: 0,
                            state: 0,
                            phone: '{{ old('billing_address_phone') }}',
                            towns: [],
                            neighborhoods: []
                        },
                        postalCodeData: {
                          CEstado: ''
                        },
                        towns: [],
                        neighborhoods: []
                    }
                },
                methods: {
                    getAddressData(event) {
                        if (event.target.checked) {
                            Object.assign(this.billingData, this.addressData);
                        } else {
                            this.billingData.name = '';
                            this.billingData.postalCode = '';
                            this.billingData.city = '';
                            this.billingData.email = '';
                            this.billingData.address = '';
                            this.billingData.neighborhood = '';
                            this.billingData.state = '';
                            this.billingData.phone = '';
                        }
                        console.log(this.billingData);
                    },
                    searchPostalCode(billing = false) {
                        fetch("{{ route('searchPostalCode', '') }}/" + (billing ? this.billingData.postalCode : this.addressData.postalCode))
                            .then(response => response.json())
                            .then(data => {
                              if (billing) {
                                this.billingData.state = data.CEstado;
                                this.searchTownByState(true);
                                this.billingData.city = data.CMunicipio;
                                this.searchColonyByTown(true);
                                this.searchColonyByPostalCode(true);
                              }else{
                                this.addressData.state = data.CEstado;
                                this.searchTownByState();
                                this.addressData.city = data.CMunicipio;
                                this.searchColonyByTown();
                                this.searchColonyByPostalCode();
                              }
                              console.log(data);
                            });

                            // this.searchTownByState();
                    },
                    searchTownByState(billing = false) {
                      if (billing) {
                        fetch("{{ route('searchTownByState', '') }}/" + this.billingData.state)
                            .then(response => response.json())
                            .then(data => this.billingData.towns = data);
                      }else{
                        fetch("{{ route('searchTownByState', '') }}/" + this.addressData.state)
                            .then(response => response.json())
                            .then(data => this.addressData.towns = data);
                      }
                    },
                    searchColonyByTown(billing = false) {
                      console.log(this.addressData.state);
                      if (billing) {
                        fetch("{{ route('searchColonyByTown', ['', '']) }}/" + this.billingData.state + '/' + this.billingData.city)
                            .then(response => response.json())
                            .then(data => this.billingData.neighborhoods = data);
                      }else{
                        fetch("{{ route('searchColonyByTown', ['', '']) }}/" + this.addressData.state + '/' + this.addressData.city)
                            .then(response => response.json())
                            .then(data => this.addressData.neighborhoods = data);
                      }
                    },
                    searchColonyByPostalCode(billing = false) {
                      if (billing) {
                        fetch("{{ route('searchColonyByPostalCode', '') }}/" + this.billingData.postalCode)
                            .then(response => response.json())
                            .then(data => {
                              this.billingData.neighborhood = data.CColonia
                            });
                      }else{
                        fetch("{{ route('searchColonyByPostalCode', '') }}/" + this.addressData.postalCode)
                            .then(response => response.json())
                            .then(data => {
                              this.addressData.neighborhood = data.CColonia
                            });
                      }
                    }
                }
            }).mount('#app')
        </script>
    @endpush
</x-layouts.app>
