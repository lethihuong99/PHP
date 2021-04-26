@extends('frontend.frontend-layout')
@section('title', 'ban hang')
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('fr.home')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{route('fr.post.index')}}">{{$post->title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  <!-- End Breadcrumbs -->
    <!-- Product Style -->
    <!-- Breadcrumbs -->
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>{{$post->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumbs -->  --}}
            <!-- Shop Single -->
            <section class="shop single section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-des">
                                        <div class="short">
                                            <h2 class="title1">{{ $post->title }}</h2>
                                            <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->created_at->format(' d-m-Y')}}
                                        </div>
                                    </div>
                                    <div class="product-gallery">
                                        <div class="flexslider-thumbnails">
                                            <ul>
                                                <li data-thumb="images/bx-slider1.jpg"
                                                    rel="adjustX:10, adjustY:">
                                                    <img class="hover-img"
                                                         src="{{ asset('/uploads/images/posts/' . $post->image) }}"
                                                         alt="#">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                   
                                    <div class="content">
                                        @if($post->quote)
                                        <blockquote style="font-size:20px"> <i class="fa fa-quote-left"></i> {!! ($post->brief_quote) !!}</blockquote>
                                        
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                          
                                        {!! $post->description !!}
                                 
                            
                            <div class="row mt-4">
                                <div class="col-12">
                                    Tags:
                                    {!! $post->portal_tag_labels !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ End Shop Single -->
        </div>
    </div>
{{--      <div class="row">
        <h4>Display Comments</h4>

        @include('frontend.posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

        <hr />
        <h4>Add comment</h4>
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name=body></textarea>
                <input type=hidden name=post_id value="{{ $post->id }}" />
            </div>
            <div class="form-group">
                <input type=submit class="btn btn-success" value="Add Comment" />
            </div>
        </form>
    </div>
  --}}
@endsection
@push('stylesheets')
    <style>
        .content{
            margin-top:20px;
        }
        .date{
            margin-top:5px;
        }
       .title1{
           text-transform: uppercase;
       }
    </style>
@endpush