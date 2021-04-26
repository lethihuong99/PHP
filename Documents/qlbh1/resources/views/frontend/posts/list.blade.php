@extends('frontend.frontend-layout')
@section('title', 'PCCC')

@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('fr.home')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{route('fr.post.index')}}">Bài viết</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
    
{{-- <!-- Start Blog Single -->
<section class="blog-single shop-blog grid section">
    <div class="container">
        <div class="row">
            <div class="col-lg-16 col-24">
                <div class="row">
                  
                    @foreach($posts as $key => $post)
                    <div class="col-lg-8 col-md-6 col-12">
                        @include('frontend.posts.components.single', ['post' => $post])
                    </div>
                    @endforeach
                    <div class="col-12">
                        <!-- Pagination -->
                                {{$posts->links()}}
                         
                        <!--/ End Pagination -->
                    </div>
                    
                </div>
            </div>
           
            <div class="col-lg-8 col-24">
                @include('frontend.commons.sidebar')
            </div>
        </div>
    </div>
</section> --}}


 <!--/ End Blog Single -->
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    @include('frontend.commons.sidebar')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    
                    <div class="row">
                      {{--   @foreach($posts as $key => $post)
                            <div class="col-lg-6 col-md-6 col-12">
                                @include('frontend.posts.components.single', ['post' => $post])
                            </div>
                        @endforeach --}}
                                <div class="product-image-wrapper" style="border:none">
                                    <h3 class="title2">Bài viết</h3>
                                    @foreach($posts as $key => $post)
                                    @include('frontend.posts.components.single', ['post' => $post])
                                    @endforeach
                                <div class="pagination">
                                    {{$posts->links()}}
                                </div>
                           
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
@push('stylesheets')
    <style>
        .pagination{
            display:inline-flex;
        }
        .title2{
            text-align: left;
            padding-left:50px;
        }
    </style>
@endpush