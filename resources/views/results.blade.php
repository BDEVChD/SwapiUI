@extends('layouts.layout')

<div style="color: white"> 
    @section('content')
         @if($results)
            <div class="box-container">
            <form action="/itemsearch" method="post" class="input-group" style="width: 30%; float: right; padding: 0px 40px 0 0;" >
            @csrf
                <input name="item" type="search" class="form-control rounded" placeholder="Search for specific {{ucwords($category)}}" aria-label="Search" aria-describedby="search-addon"/>
                <input type="hidden" name="category" value="{{$category}}"> 
                <button type="submit" value="item-val" class="btn btn-outline-warning">search</button>
            </form>
                @foreach($results as $item)
                    <div class="box">
                        <p>
                            <a href="/{{$item['category']}}/{{$item['id']}}" class="item-category-result">
                                <h2 style="position: relative; top: 10px;">{{$item['name'] ?? $item['title']}}</h2>
                            </a>
                        </p>
                    </div>
                    <br>
                @endforeach
            </div>
        @endif
    </div>
@endsection

