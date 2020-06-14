<!DOCTYPE html>
<html lang="es" dir="ltr">
   
    <head>
        <meta charset="utf-8">
        <title></title>
        @foreach($data as $enviar)
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=https://wa.me/502{{$enviar->telefono}}">
        @endforeach
        
    </head>
    <body>
    </body>
</html>