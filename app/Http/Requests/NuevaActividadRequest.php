<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NuevaActividadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nombreActividad"=>"required|string",
            "descripcionActividad"=>"required|string",
            "FechaActividad"=>"required|date",
            "horaInicio"=>"required|date_format:H:i",
            "horaFin"=>"required|date_format:H:i",
            "tipoActividad"=>"required|exists:tipoactividad,id"
        ];
    }
}
