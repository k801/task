@extends('layouts.app')

@section('content')
<div class="container w-50" >
<th><a href="{{route('articles')}}"  class=" btn btn-info text-light float-right mb-2">back</a></th>

    <form action="{{route('store_article')}}" method="post">
        @csrf
<div class="form-group">
    <label for="my-input">title</label>
    <input id="my-input" class="form-control" type="text" name="title" >

</div>
<div class="form-group">
    <label for="my-input">category</label>
    <select class="form-control" name="cat_id" required>
                    <option value=''> category</option>
          @foreach($categories as $category)
                  <option value={{$category->id}}>{{$category->name}}</option>
          @endforeach

    </select>
</div>
<div class="form-group">
    <label for="my-input" >description</label>
    <textarea  rows="10"class="form-control my-3" name="description" required>
    </textarea>

    </div>
<button class="btn btn-primary" type="submit" role="button"> submit</button>
        </form>
</div>

@endsection
