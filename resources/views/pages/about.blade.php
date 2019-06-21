@extends('layouts.app')

@section('content')
    <div id="back">
        <form action="/" method="GET">
            <input type="submit" value="arrow_back_ios" class="material-icons btn btn-default back">
        </form>
    </div>
    
    <div class="title">
        <?php echo $title; ?>
    </div>
    <p>This is my about page.</p>
                
    <div class="links">
        <a href="/">Home</a>
        <a href="/services">Services</a>
    </div>
@endsection