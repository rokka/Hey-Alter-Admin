<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Schule {{ $school->identifier }} bearbeiten
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('schools.update', $school->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $school->name) }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="type" class="block font-medium text-sm text-gray-700">Typ</label>
                            <input type="text" name="type" id="type" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('type', $school->type) }}" placeholder="Nicht angegeben" />
                            @error('type')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="zip" class="block font-medium text-sm text-gray-700">PLZ</label>
                            <input type="text" name="zip" id="zip" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('zip', $school->zip) }}" placeholder="Nicht angegeben" />
                            @error('zip')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="city" class="block font-medium text-sm text-gray-700">Ort</label>
                            <input type="text" name="city" id="city" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('city', $school->city) }}" placeholder="Nicht angegeben" />
                            @error('city')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="street" class="block font-medium text-sm text-gray-700">Straße</label>
                            <input type="text" name="street" id="street" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('street', $school->street) }}" placeholder="Nicht angegeben" />
                            @error('street')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="phone" class="block font-medium text-sm text-gray-700">Telefonnummer</label>
                            <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('phone', $school->phone) }}" placeholder="Nicht angegeben" />
                            @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="contact_person" class="block font-medium text-sm text-gray-700">Kontaktperson</label>
                            <input type="text" name="contact_person" id="contact_person" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('contact_person', $school->contact_person) }}" placeholder="Nicht angegeben" />
                            @error('contact_person')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Speichern
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>