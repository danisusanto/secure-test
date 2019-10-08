@extends('layouts.main')

@section('title', 'Product - Secure Test')

@extends('layouts.nav')

@section('content')
    <div class="container mt-5 product-box">
        <div class="row product-box__control">
            <div class="col-md-6 col-lg-6 col-12 mb-1">
                <a href="" class="btn btn-primary product-box__control-btn-insert">INSERT</a>
            </div> 
            <div class="col-md-6 col-lg-6 col-12">
                <input type="text" class="form-control btn-lg" placeholder="Search">
            </div>
        </div>
        <div class="row mt-5 product-box__item">
            <div class="col-md-4 col-lg-4 col-12">
                <div class="card product-box__item-card">
                    <div class="card-header product-box__item-card-title pt-3 text-center">
                        Hot Lecturer and Me
                    </div>
                    <div class="card-body pt-0">
                        <img src="https://www.gramedia.com/blog/content/images/2019/01/hot-lecturer-and-me.jpg" class="img-fluid" alt="">
                        <div class="row mt-3">
                            <div class="col-md-6 col-lg-6 col-12">
                                <a href="" class="btn btn-outline-danger form-control">DELETE</a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-12">
                                <a href="" class="btn btn-success form-control">EDIT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection