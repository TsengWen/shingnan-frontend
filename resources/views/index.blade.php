@extends('layouts.layout_main')

@section('title', '興南眼鏡行')

@section('content')
<!-- carousel -->
<div id="carouselCover" class="carousel slide mw-100" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="img/cover.png">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="img/cover.png">
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid" src="img/cover.png">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselCover" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselCover" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- image navbar -->
<nav class="navbar navbar-toggleable-md navbar-light bg-light2 d-flex justify-content-around">
    <div id="navbarImg">
        <div class="navbar-nav">
            <a class="nav-item nav-link mx-5" href="#" style="color: black;">ABOUT US</a>
            <a class="nav-item nav-link mx-5" href="#" style="color: black;">WHAT'S NEW</a>
            <a class="nav-item nav-link mx-5" href="#" style="color: black;">BRAND</a>
            <a class="nav-item nav-link mx-5" href="/buy" style="color: black;">BUY</a>
            <a class="nav-item nav-link mx-5" href="#" style="color: black;">EDUCATION</a>
        </div>
    </div>
</nav>
<!-- image gallery -->
<div class="row-cus">
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div> 
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
    <div class="column">
        <img src="img/01.jpg" style="width: 100%;">
        <div class="gallery-overlay">
            <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
    </div>
</div>
<!-- got top button -->
<button id="go-top-btn">TOP</button>
@endsection
