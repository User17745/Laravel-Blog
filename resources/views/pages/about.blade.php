@extends('layouts.app')

@section('content')
    <div class="title">
        <?php echo $title; ?>
    </div>
    <p>This is my about page.</p>
                
    <div class="links">
        <a href="/">Home</a>
        <a href="/services">Services</a>
    </div>
@endsection