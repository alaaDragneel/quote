@extends('layouts.master')

@section('title')
     Trending Quotes
@endsection

@section('content')
     @include('includes.header')
     <div class="row">
          <div class="col-md-6 col-md-offset-4">
               @if (!empty(Request::segment(1)))
                    <div class="alert alert-warning"><a href="{{ route('index') }}">Show All Quotes</a></div>
               @endif
               @if (count($errors) > 0)
                    <div class="alert alert-danger text-center">
                         <ul class="list-unstyled">
                              @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                              @endforeach
                         </ul>
                    </div>
               @endif
               @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
               @endif
               <section class="quotes">
                    <h1>Latest Quote</h1>
                    <div class="col-md-12">
                         @foreach ($quotes as $quote)
                              <div class="col-md-6">
                                   <article class="quote">
                                        <div class="delete pull-right"><a href="{{ route('delete', ['id' => $quote->id]) }}">x</a></div>
                                             <p>{{ $quote->quote }}</p>
                                        <div class="info">created By <a href="{{ route('index', ['author' => $quote->author->name]) }}">{{ $quote->author->name }}</a> on {{ $quote->created_at }}</div>
                                   </article>
                              </div>
                         @endforeach
                    </div>
                    <div class="paginate">
                         @if ($quotes->currentPage() !== 1)
                              <a href="{{ $quotes->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
                         @endif
                         @if ($quotes->currentPage() !== $quotes->lastPage() && $quotes->hasPages())
                              <a href="{{ $quotes->nextPageUrl() }}"><span class="fa fa-caret-square-o-right"></span></a>
                         @endif
                    </div>
               </section>
               <section class="edit-quote">
                    <h1>Add a Quote</h1>
                    <form action="{{ route('create') }}" method="post">
                         <div class="input-group">
                              <label for="author">Your name</label>
                              <input type="text" class="form-control" name="author" id="author" placeholder="Your Name"/>
                         </div>
                         <div class="input-group">
                              <label for="email">Your email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Your email"/>
                         </div>
                         <div class="input-group">
                              <label for="quote">Your quote</label>
                              <textarea name="quote" id="quote" class="form-control area" rows="5" placeholder="Your Quote"></textarea>
                         </div>
                         <button type="submit" class="btn btn-primary">Submit Quote</button>
                         {{ csrf_field() }}
                    </form>
               </section>
          </div>
     </div>
@endsection
