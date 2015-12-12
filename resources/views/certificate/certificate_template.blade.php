<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Example 2</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('static/certificate_template/css/pdf.css') !!}">

    </head>
    <body>

        @foreach($certificates as $item)
        <div class="header">
            <div class="fila">
                <div class="logo-izq">{{$item['logo_izq']}}</div>
                <div class="logo-der">{{$item['logo_der']}}</div>
            </div>
        </div>

        <div class="header">
            <div class="fila">
                <div class="copy"><p>{{$item['copy1']}}</p><br><br></div>
            </div>
            <div class="fila">
                <div class="copy"><p>{{$item['copy2']}}</p></div>      
            </div>
            <div class="fila">
                <div class="copy"><p>{{$item['copy3']}}</p></div>      
            </div>
            <div class="fila">
                <div class="copy"><p>{{$item['copy4']}}</p></div>      
            </div>
            <div class="fila">
                <div class="copy"><p>{{$item['copy5']}}</p></div>      
            </div>

            <div class="fila">
                <div class="copy"><p>{{$item['copy6']}}</p></div>      
            </div>

            <div class="fila">
                <div class="copy6">
                    <p>{{$item['copy7']}}</p>
                    <p>{{$item['copy8']}} <br> {{$item['copy9']}}</p></div>      
            </div>

            <div class="fila">
                <div class="copy6">
                    <p>{{$item['copy10']}}</p>

                </div>
            </div>

            <div class="fila">
                <div class="firma1"><p>Firma 1</p></div>  
                <div class="firma2"><p>Firma 2</p></div>    
            </div>

            <div class="fila">
                <div class="copy6">
                    <p>Marca de la firma digital</p>

                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>

        @endforeach


    </body>
</html>