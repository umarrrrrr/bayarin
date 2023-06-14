<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nasabah_id' => 'required|integer',
            'nomor_tagihan' => 'required|string',
            'jumlah_tagihan' => 'required|numeric',
        ];
    }
}
