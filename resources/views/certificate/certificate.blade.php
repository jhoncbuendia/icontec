<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Example 2</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('static/certificate_template/css/pdf.css') !!}">

    </head>
    <body>
        <div class="header">
            <div class="fila">
                <div class="logo-izq">{{$certificate['logo_izq']}}</div>
                <div class="logo-der">{{$certificate['logo_der']}}</div>
            </div>
        </div>

        <div class="header">
            <div class="fila">
                <div class="copy"><p>{{$certificate['copy1']}}</p><br><br></div>
            </div>
            <div class="fila">
                <div class="copy"><p>{{$certificate['copy2']}}</p></div>      
            </div>
            <div class="fila">
                <div class="copy"><p>{{$certificate['copy3']}}</p></div>      
            </div>
            <div class="fila">
                <div class="copy"><p>{{$certificate['copy4']}}</p></div>      
            </div>
            <div class="fila">
                <div class="copy"><p>{{$certificate['copy5']}}</p></div>      
            </div>

            <div class="fila">
                <div class="copy"><p>{{$certificate['copy6']}}</p></div>      
            </div>

            <div class="fila">
                <div class="copy6">
                    <p>{{$certificate['copy7']}}</p>
                    @foreach($certificate['copy8'] as $item)
                    <p>{{$item}}</p>
                    @endforeach
                </div>      
            </div>

            <div class="fila">
                <div class="copy6">
                    <p>{{$certificate['copy9']}}</p>
                </div>
            </div>

            <div class="fila">
                <div class="firma1"><p>{{$certificate['copy10']}}</p></div>  
                <div class="firma2"><p>Firma 2</p></div>    
            </div>

            <div class="fila">
                <div class="copy6">
                    <p>Marca de la firma digital</p>

                </div>
            </div>
        </div>

    </body>
</html>