<div class="grid h-screen place-items-center">
    <form wire:submit.prevent="generate" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div>
            <x-form.input wire:model.lazy="qrCode" name="qrCode" type="search" x-model="input3"
                          :label="__('Write the text')" required/>
        </div>
        <div class="mx-auto w-6/12 mt-5">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Generate QR Code
            </button>
        </div>
    </form>
    <button class="search-clear-button" wire:click="clearGeneratedCode">
        <i class="fa fa-close"></i>
    </button>
    @if ($this->getGeneratedQrCodeProperty())
        <div class="mt-6">
            {!! $this->getGeneratedQrCodeProperty() !!}
        </div>
    @endif
</div>




