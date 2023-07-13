<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediji</title>
</head>
<body>
    <h1>{{ $title }}</h1>

    @isset($data)    
       @forelse ($data as $media) 
          <p>{{ $media }}</p> 
       @empty
          <p>No data!</p>  
       @endforelse                
    @endisset

    <p>Random value is @random </p>

    {{date('d.m.Y', time())}}
</body>
</html>


