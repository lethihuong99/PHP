
<!-- Start Single Blog  -->
<div class="single-products" >
    <div class="text-center">
    <a href="{{ route('fr.post.show', ['slug' => $post->slug, 'id' => $post->id]) }}">
        <img class="default-img"
             src="{{asset('uploads/images/posts')}}/{{$post->image}}"
             alt="#">
    </a>
    </div>
       
 
    <a href="{{route('fr.post.show',['slug' => $post->slug, 'id' => $post->id])}}" class="title1">{{$post->title}}</a>
    <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->created_at->format( 'd-m-Y')}}</p>
    <p >{!!$post->brief_summary!!}</p>
        
</div>                          
@push('javascripts')
    <script src="{{asset('frontend/js/active.js')}}"></script>
@endpush
@push('stylesheets')
    <style>
        .single-products{
            margin:20px;
            padding:20px;
        }
        .default-img{
            float: left;
            width:30%;
            padding:20px;
            height: 150px;
        }
        .text-center{
            margin-bottom: 10px;
        }
        .title1{
            color: #000;
            font-size: 20px;
        }
        .title1:hover{
            color:red;
        }
        
    </style>
@endpush
