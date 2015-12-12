<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificatePdfController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function hola() {
        $resutlt = \DB::connection('mysql')->select('call asistencia(176);');
        return $resutlt;
    }

    public function diplomado() {
        $certificados = \DB::connection('mysql')->select('call certificados(176);');
        if (count($certificados) > 0) {
            $certificado = $certificados[0];
            return $this->certificado([
                        'logo_izq' => $certificado->logotipo_sponsor,
                        'logo_der' => $certificado->logo_tipo_certificado,
                        'copy1' => 'certifican que:',
                        'copy2' => $certificado->nombre,
                        'copy3' => 'C.C ' . $certificado->idnumber,
                        'copy4' => 'Asistio y Aprobo el programa',
                        'copy5' => $certificado->servicio,
                        'copy6' => 'Con una intensidad horaria de 48 horas',
                        'copy7' => 'El contenido del programa comprendio:',
                        'copy8' => explode(",", $certificado->modulos),
                        'copy9' => $certificado->sucursal . ' ' . $certificado->fecha_final,
                        'copy10' => $certificado->firma_convenio,
            ]);
        }
        return "No puede generar este certificado";
    }

    public function certificado($certificates) {

        $view = \View::make('certificate.certificate', ['certificate' => $certificates])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');
    }

    public function render() {
        //return "ok";
        $certificate1 = array(
            'logo_izq' => 'url logo izq',
            'logo_der' => 'url logo der',
            'copy1' => 'certifican que:',
            'copy2' => 'Sebastian Perez',
            'copy3' => 'C.C 78767665',
            'copy4' => 'Asistio y Aprobo el programa',
            'copy5' => 'FORMACION DE AUDITORES INTERNOS 
                                        SISTEMA DE GESTION DE CALIDAD ISO
                                        9001:2008',
            'copy6' => 'Con una intensidad horaria de 48 horas',
            'copy7' => 'El contenido del programa comprendio:',
            'copy8' => '- Fundamentos ISO 900 estructura y analisis',
            'copy9' => '- Tecnica de auditoria interna ',
            'copy10' => 'Medellin, 18 de febrero de 2012',
        );

        $certificate2 = array(
            'logo_izq' => 'url logo izq 222',
            'logo_der' => 'url logo der 222',
            'copy1' => 'certifican que:',
            'copy2' => 'Angel Peña',
            'copy3' => 'C.C 78767665',
            'copy4' => 'Asistio y Aprobo el programa',
            'copy5' => 'FORMACION DE AUDITORES INTERNOS 
                                        SISTEMA DE GESTION DE CALIDAD ISO
                                        9001:2008',
            'copy6' => 'Con una intensidad horaria de 48 horas',
            'copy7' => 'El contenido del programa comprendio:',
            'copy8' => '- Fundamentos ISO 900 estructura y analisis',
            'copy9' => '- Tecnica de auditoria interna ',
            'copy10' => 'Medellin, 18 de febrero de 2012',
        );

        $certificates = array();
        array_push($certificates, $certificate1);
        array_push($certificates, $certificate2);

        $data = $this->getData();
        $date = date('Y-m-d');
        $prueba['nombre'] = "jhon";
        $invoice = "2222";
        $view = \View::make('certificate.certificate_template', compact('certificates', 'prueba', 'data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');
    }

    public function getData() {
        $data = [
            'quantity' => '1',
            'description' => 'some ramdom text',
            'price' => '500',
            'total' => '500'
        ];
        return $data;
    }

}
