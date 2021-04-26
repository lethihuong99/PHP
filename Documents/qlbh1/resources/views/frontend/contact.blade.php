@extends('frontend.frontend-layout')
@section('content')
    <div class="container my-4">
        <form action="{{route('fr.contact.send')}}" method="POST">
            @csrf
            <h5 style="text-align: center;" class="mb-2">Contact Us</h5>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white">
                        <i class="fa fa-user"></i>&nbsp
                      </span>
                    </div>
                    <input name="name" type="name"
                           placeholder="Name"
                           readonly
                           value="{{ \Illuminate\Support\Facades\Auth::user()->name }}"
                           class="form-control border-left-0"
                           required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white">
                        <i class="fa fa-envelope"></i>
                      </span>
                    </div>
                    <input name="email" type="email" placeholder="Email"
                           value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"
                           readonly
                           class="form-control border-left-0" required>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control"
                          name="message"
                          id="message" rows="5"
                          placeholder="Enter message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">
                <i class="fa fa-paper-plane"></i>
                Send
            </button>
        </form>
    </div>
@endsection
