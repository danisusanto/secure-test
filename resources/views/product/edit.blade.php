@extends('layouts.main')

@section('title', 'Product - Secure Test')

@section('content')
    
    @include('layouts.nav')
    
    <div class="container mt-5">
        <div class="row product-form">
            <div class="col-md-12 col-lg-12 col-12 mb-1">
                <div class="alert alert-danger d-none" role="alert"></div>
                <div class="alert alert-success d-none" role="alert"></div>
                <div class="card product-form__card">
                    <div class="card-body">
                        <form id="form-product">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Author</label>
                                <input type="text" name="author" class="form-control" value="{{ $product->author }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label><br>
                                <img src="{{ $product->image }}" class="img-fluid" alt="">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea type="text" name="description" class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="spinner-grow d-none" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <button type="submit" class="btn btn-primary product-form__card-btn-insert">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#form-product").submit(function(e) {
                e.preventDefault();
                $(".btn-primary").addClass("d-none");
                $(".spinner-grow").removeClass("d-none");
                let form = new FormData($(this)[0]);
                axios.post("{{ url('/product/update/'.$product->id) }}", form)
                .then(response => {
                    let message = response.data;
                    if(message.status) {
                        window.location = "{{ url('/product') }}"
                    } else {
                        $(".btn-primary").removeClass("d-none");
                        $(".spinner-grow").addClass("d-none");
                        let html = "<span>"+message.message.errorInfo[0]+"<span>";
                        $(".alert-danger").removeClass("d-none");
                        $(".alert-danger").html(html);
                    }
                })
                .catch(error => {
                    let message = error.response.data.errors;
                    var html = "<ul>";
                    if(message.title) {
                        html += "<li>"+message.title[0]+"</li>";
                    }
                    if(message.author) {
                        html += "<li>"+message.author[0]+"</li>";
                    }
                    if(message.image) {
                        html += "<li>"+message.image[0]+"</li>";
                    }
                    if(message.description) {
                        html += "<li>"+message.description[0]+"</li>";
                    }
                    html += "</ul>";
                    $(".alert-danger").removeClass("d-none");
                    $(".alert-danger").html(html);
                    $(".btn-primary").removeClass("d-none");
                    $(".spinner-grow").addClass("d-none");
                })
            })
        })
    </script>
@endsection