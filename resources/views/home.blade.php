@extends('layouts.app')
@section('css')
<style>
    html {
        scroll-behavior: smooth;
    }

    body {
        padding-bottom: 3rem;
        color: #5a5a5a;
    }

    .carousel {
        margin-bottom: 4rem;
    }

    .carousel-caption {
        bottom: 3rem;
        z-index: 10;
    }

    .carousel-item {
        height: 32rem;
    }

    .carousel-item>img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 32rem;
    }

    .carousel-control-prev,
    .carousel-control-next {

        background: 0 0;
        border: 0;
    }

    .marketing .col-lg-4 {
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .marketing h2 {
        font-weight: 400;
    }

    .marketing .col-lg-4 p {
        margin-right: .75rem;
        margin-left: .75rem;
    }


    .featurette-divider {
        margin: 5rem 0;
        /* Space out the Bootstrap <hr> more */
    }

    .featurette-heading {
        font-weight: 300;
        line-height: 1;
        letter-spacing: -.05rem;
    }



    @media (min-width: 40em) {
        .carousel-caption p {
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            line-height: 1.4;
        }

        .featurette-heading {
            font-size: 50px;
        }
    }

    @media (min-width: 62em) {
        .featurette-heading {
            margin-top: 7rem;
        }
    }
</style>
@endsection
@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @if($featured->count() > 1)
        @foreach($featured as $f)
        <li data-target="#myCarousel" data-slide-to="{{ ++$loop->index-1 }}" class=" {{ ++$loop->index == 1 ? 'active' :  ''}}"></li>
        @endforeach
        @endif
    </ol>
    <div class="carousel-inner">
        @foreach($featured as $f)
        <div class="carousel-item {{ ++$loop->index == 1 ? 'active' :  ''}}">
            <img src="{{ asset('storage/images/products/'.$f->image) }}" class="d-block w-100" alt="{{$f->name}}">

            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>{{$f->name}}</h1>
                    <p> &#8369; {{$f->price}}</p>
                    <p>{{$f->description}}</p>

                    @if(Cart::session((auth()->user()) ? auth()->id() : '_token')->get($f->id))
                    <form action="{{ route('carts.remove', $f->id) }}">
                        <button type="submit" class="btn btn-sm btn-danger "> <i class="fas fa-trash"></i> Remove to cart</button>
                    </form>
                    @else
                    <form action="{{ route('carts.add', $f->id) }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-sm btn-success  "> <i class="fas fa-cart-plus"> </i> Add to Cart</butt>
                    </form>
                    @endif

                </div>
            </div>
        </div>
        @endforeach

    </div>
    @if($featured->count() > 1)
    <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
    @endif
</div>
<div class="container marketing">
    <!-- new product -->
    @if($new_products->count() > 0)
    <div class="row m-2">
        <div class="col-lg-12">
            <h1 class="text-center">New Products</h1>
        </div>
    </div>
    @endif
    <div class="row">

        @foreach($new_products as $p)
        <div class="col-lg-4 col-md-4 col-6 mb-2 mb-lg-0">
            <div class="card h-100" style="width: 18rem;">
                <a href="{{ route('product', $p->id) }}">
                    <img src="{{ asset('storage/images/products/'.$p->image) }}" class="card-img-top" alt="{{$f->name}}"> </a>
                <div class="card-body">
                    <a href="{{ route('product', $p->id) }}">
                        <h5 class="text-dark  text-truncate ">{{$p->name}}</h5>
                        <p class="small text-muted font-weight-light text-truncate">{{$p->description}}</p>
                        <p class="text-muted small mb-0">₱ {{$p->price}}</p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>




    @foreach($featured as $f)
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7  {{ ++$loop->index  % 2 == 0 ? 'order-md-2' : ''}}  d-flex flex-column justify-content-around">
            <h2 class="featurette-heading">{{$f->name}} <span class="text-muted"> ₱ {{$f->price}}</span></h2>
            <p class="lead"> {{$f->description}}</p>
            @if(Cart::session((auth()->user()) ? auth()->id() : '_token')->get($f->id))
            <form action="{{ route('carts.remove', $f->id) }}">
                <button type="submit" class="btn btn-sm btn-danger "> <i class="fas fa-trash"></i> Remove to cart</button>
            </form>
            @else
            <form action="{{ route('carts.add', $f->id) }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-sm btn-success  "> <i class="fas fa-cart-plus"> </i> Add to Cart</butt>
            </form>
            @endif
        </div>
        <div class="col-md-5 {{ ++$loop->index  % 2 == 0 ? 'order-md-1' : ''}}   ">
            <img src="{{ asset('storage/images/products/'.$f->image) }}" class="img-fluid mx-auto" width="500" height="500">
        </div>
    </div>
    @endforeach

    <hr class="featurette-divider">


</div>

<!-- FOOTER -->
<footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>© 2020-2021 WI7 | Jerald Lim. </p>
</footer>
@endsection