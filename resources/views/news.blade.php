@extends('layouts.layout')




@section('content')

    {{-- SLIDER  --}}

    <section id="showcase">
        <div class="container">
            <div class="row">
                <div class="col-md-">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img width="1120" height="320" class="d-block" src="https://images.perthnow.com.au/publication/B88770342Z/1520741696758_GEF1GSK7C.2-2.jpg"
                                     alt="First slide">
                                <div class="container">
                                    <div class="carousel-caption text-right">
                                        <h1 class="display-3">Heading One</h1>
                                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis,
                                            facilis laborum numquam sed voluptatibus. Impedit ipsum minima perspiciatis
                                            veritatis?</p>
                                        <a href="#" class="btn btn-danger btn-lg ml-auto">Læs mere!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img width="1120" height="320" class="d-block" src="https://source.unsplash.com/random/721x120.jpg"
                                     alt="Second slide">
                                <div class="container">
                                    <div class="carousel-caption text-right">
                                        <h1 class="display-3">Heading Two</h1>
                                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis,
                                            facilis laborum numquam sed voluptatibus. Impedit ipsum minima perspiciatis
                                            veritatis?</p>
                                        <a href="#" class="btn btn-danger btn-lg ml-auto">Læs mere!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img width="1120" height="320" class="d-block" src="https://source.unsplash.com/random/722x120.jpg"
                                     alt="Third slide">
                                <div class="container">
                                    <div class="carousel-caption text-right">
                                        <h1 class="display-3">Heading Three</h1>
                                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis,
                                            facilis laborum numquam sed voluptatibus. Impedit ipsum minima perspiciatis
                                            veritatis?</p>
                                        <a href="#" class="btn btn-danger btn-lg ml-auto">Læs mere!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#carouselExampleControls" class="carousel-control-prev" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>

                        <a href="#carouselExampleControls" class="carousel-control-next" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>









@stop