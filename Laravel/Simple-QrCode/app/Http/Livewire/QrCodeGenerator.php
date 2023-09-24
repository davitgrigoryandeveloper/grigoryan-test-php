<?php

namespace App\Http\Livewire;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeGenerator extends Component
{
    public string $qrCode = '';
    private string $generatedQrCode = '';

    /**
     * Render the QR code generator view.
     */
    public function render()
    {
        return view('livewire.qr-code-generator');
    }

    /**
     * Generates a QR code and stores it in the $generatedQrCode property.
     */
    public function generate(): void
    {
        $this->generatedQrCode = QrCode::format('svg')->generate($this->qrCode);
    }

    /**
     * Clear the generated QR code.
     *
     * This method sets the generated QR code to an empty string, effectively clearing it.
     */
    public function clearGeneratedCode(): void
    {
        $this->generatedQrCode = '';
    }

    /**
     * Get the generated QR code property.
     *
     * @return string The generated QR code.
     */
    public function getGeneratedQrCodeProperty(): string
    {
        return $this->generatedQrCode;
    }
}
