<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Computer {{ $computer->identifier }} bearbeiten
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('computers.update', $computer->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                    
                        @if (Auth::user()->currentTeam->use_donor_information)
                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="donor" class="block font-medium text-sm text-gray-700">Spender</label>
                                <input type="text" name="donor" id="donor" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('donor', $computer->donor) }}" placeholder="Nicht angegeben" />
                                @error('donor')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="email" class="block font-medium text-sm text-gray-700">E-Mail-Adresse</label>
                                <input type="email" name="email" id="email" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('email', $computer->email) }}" placeholder="Nicht angegeben" />
                                @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="type" class="block font-medium text-sm text-gray-700">Geräteklasse</label>
                                <select name="type" id="type" class="form-singleselect block rounded-md shadow-sm mt-1 block w-full">
                                    <option value="0" {{ (old('roles', $computer->type) == '0') ? ' selected' : '' }}>Unbekannt</option>
                                    <option value="1" {{ (old('roles', $computer->type) == '1') ? ' selected' : '' }}>Desktop</option>
                                    <option value="2" {{ (old('roles', $computer->type) == '2') ? ' selected' : '' }}>Laptop</option>
                                    <option value="3" {{ (old('roles', $computer->type) == '3') ? ' selected' : '' }}>Tablet</option>
                                    <option value="4" {{ (old('roles', $computer->type) == '4') ? ' selected' : '' }}>Small Form Factor</option>
                                </select>
                                @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="model" class="block font-medium text-sm text-gray-700">Modell</label>
                                <input type="text" name="model" id="model" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('model', $computer->model) }}" />
                                @error('model')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="has_webcam" id="has_webcam" class="form-checkbox rounded-md" value="1" @if(old('has_webcam',$computer->has_webcam)=="1") checked @endif />
                                    <span class="ml-2">Web-Cam integriert</span>
                                </label>
                                @error('has_webcam')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="has_wlan" id="has_wlan" class="form-checkbox rounded-md" value="1" @if(old('has_wlan',$computer->has_wlan)=="1") checked @endif />
                                    <span class="ml-2">WLAN integriert</span>
                                </label>
                                @error('has_wlan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="required_equipment" class="block font-medium text-sm text-gray-700">Benötigtes Zubehör (außer Web-Cam und WLAN)</label>
                            <input type="text" name="required_equipment" id="required_equipment" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('required_equipment', $computer->required_equipment) }}" />
                            @error('required_equipment')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="state" class="block font-medium text-sm text-gray-700">Status</label>
                            <select name="state" id="state" class="form-singleselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="new" {{ (old('roles', $computer->state) == 'new') ? ' selected' : '' }}>{{ __('xcomputer.state_new') }}</option>
                                <option value="in_progress" {{ (old('roles', $computer->state) == 'in_progress') ? ' selected' : '' }}>{{ __('xcomputer.state_in_progress') }}</option>
				<option value="refurbished" {{ (old('roles', $computer->state) == 'refurbished') ? ' selected' : '' }}>{{ __('xcomputer.state_refurbished') }}</option>
                                <option value="picked" {{ (old('roles', $computer->state) == 'picked') ? ' selected' : '' }}>{{ __('xcomputer.state_picked') }}</option>
				<option value="delivered" {{ (old('roles', $computer->state) == 'delivered') ? ' selected' : '' }}>{{ __('xcomputer.state_delivered') }}</option>
                                <option value="loss" {{ (old('roles', $computer->state) == 'loss') ? ' selected' : '' }}>{{ __('xcomputer.state_loss') }}</option>
                                <option value="destroyed" {{ (old('roles', $computer->state) == 'destroyed') ? ' selected' : '' }}>{{ __('xcomputer.state_destroyed') }}</option>
                            </select>
                            @error('state')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                            <label for="comment" class="block font-medium text-sm text-gray-700">Kommentar</label>
                            <textarea type="text" name="comment" id="comment" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('comment', $computer->comment) }}</textarea>
                            @error('comment')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!--<div class="grid grid-cols-1 sm:grid-cols-2">-->
                        <div class="grid grid-cols-1 sm:grid-cols-1">
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_deletion_required" id="is_deletion_required" class="form-checkbox rounded-md" value="1" @if(old('is_deletion_required',$computer->is_deletion_required)=="1") checked @endif />
                                    <span class="ml-2">Professionelle Löschung gewünscht</span>
                                </label>
                                @error('is_deletion_required')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!--
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="needs_donation_receipt" id="needs_donation_receipt" class="form-checkbox rounded-md" value="1" @if(old('needs_donation_receipt',$computer->needs_donation_receipt)=="1") checked @endif />
                                    <span class="ml-2">Spendenquittung gewünscht</span>
                                </label>
                                @error('needs_donation_receipt')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            -->
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="cpu" class="block font-medium text-sm text-gray-700">CPU Modell</label>
                                <input type="text" name="cpu" id="cpu" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('cpu', $computer->cpu) }}" placeholder="Unbekannt" />
                                @error('cpu')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="memory_in_gb" class="block font-medium text-sm text-gray-700">Arbeitsspeicher in GB</label>
                                <input type="text" name="memory_in_gb" id="memory_in_gb" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('memory_in_gb', $computer->memory_in_gb) }}" />
                                @error('memory_in_gb')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="required_equipment" class="block font-medium text-sm text-gray-700">Festplattentyp</label>
                                <select name="hard_drive_type" id="hard_drive_type" class="form-singleselect block rounded-md shadow-sm mt-1 block w-full">
                                    <option value="0" {{ (old('roles', $computer->hard_drive_type) == 0) ? ' selected' : '' }}>Unbekannt</option>
                                    <option value="1" {{ (old('roles', $computer->hard_drive_type) == 1) ? ' selected' : '' }}>HDD</option>
                                    <option value="2" {{ (old('roles', $computer->hard_drive_type) == 2) ? ' selected' : '' }}>SSD</option>
                                </select>
                                @error('required_equipment')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <label for="hard_drive_space_in_gb" class="block font-medium text-sm text-gray-700">Festplattengröße in GB</label>
                                <input type="text" name="hard_drive_space_in_gb" id="hard_drive_space_in_gb" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('hard_drive_space_in_gb', $computer->hard_drive_space_in_gb) }}" />
                                @error('hard_drive_space_in_gb')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-1">
                            <div class="px-4 py-3 bg-white sm:px-6 sm:py-3">
                                <span  class="block font-medium text-sm text-gray-700">Videoausgang</span>
                                <input type="checkbox" name="has_vga_videoport" id="has_vga_videoport" class="form-checkbox rounded-md" value="1" @if(old('has_vga_videoport',$computer->has_vga_videoport)=="1") checked @endif />
                                <label for="has_vga_videoport" class="mr-3">VGA</label>
                                <input type="checkbox" name="has_dvi_videoport" id="has_dvi_videoport" class="form-checkbox rounded-md" value="1" @if(old('has_dvi_videoport',$computer->has_dvi_videoport)=="1") checked @endif />
                                <label for="has_dvi_videoport" class="mr-3">DVI</label>
                                <input type="checkbox" name="has_hdmi_videoport" id="has_hdmi_videoport" class="form-checkbox rounded-md" value="1" @if(old('has_hdmi_videoport',$computer->has_hdmi_videoport)=="1") checked @endif />
                                <label for="has_hdmi_videoport" class="mr-3">HDMI</label>
                                <input type="checkbox" name="has_displayport_videoport" id="has_displayport_videoport" class="form-checkbox rounded-md" value="1" @if(old('has_displayport_videoport',$computer->has_displayport_videoport)=="1") checked @endif />
                                <label for="has_displayport_videoport" class="mr-3">DisplayPort</label>
                                @error('required_equipment')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
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
