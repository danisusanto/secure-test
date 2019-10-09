@extends('layouts.main')

@section('title', 'Product - Secure Test')

@section('content')
    
    @include('layouts.nav')
    
    <div class="container mt-5 product-box">
        <div class="row product-box__control">
            <div class="col-md-6 col-lg-6 col-12 mb-1">
                <a href="{{ url('/product/create') }}" class="btn btn-primary product-box__control-btn-insert">INSERT</a>
            </div> 
            <div class="col-md-6 col-lg-6 col-12">
                <input type="text" class="form-control btn-lg" placeholder="Search">
            </div>
        </div>
        <div class="row mt-5 product-box__item">
            @foreach($product as $product)
            <div class="col-md-4 col-lg-4 col-12 mb-4">
                <div class="card product-box__item-card">
                    <div class="card-header product-box__item-card-title pt-3">
                        <div style="width: 700px">{{$product->title}}</div>
                    </div>
                    <div class="card-body">
                        <img src="{{$product->image}}" class="img-fluid" alt="">
                        <div class="row mt-3">
                            <div class="col-md-6 col-lg-6 col-12 mb-2">
                                <a href="javascript:void(0)" data-id="{{ $product->id }}" class="btn btn-outline-danger form-control">DELETE</a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-12">
                                <a href="{{ url('/product/edit/'.$product->id) }}" class="btn btn-success form-control">EDIT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".btn-outline-danger").click(function() {
                let id = $(this).data('id');
                var cfrm = confirm("Are you sure want to delete this book?");
                if (cfrm == true) {
                    axios.delete("{{ url('/product/destroy') }}/"+id)
                    .then(response => {
                        let message = response.data;
                        if(message.status) {
                            location.reload();
                        } else {
                            alert(message.message)
                        }
                    })
                    .catch(error => {
                        let message = error.response.data.errors;
                        alert(message);
                    })
                }
            })
        })
    </script>
@endsection