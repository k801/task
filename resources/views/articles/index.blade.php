@extends('layouts.app')

@section('content')
<div class="container-fluid">

 <table class="table table-light">
 @if(Auth::user()->is_admin==1)

     <a href="{{route('add_article')}}" class="btn btn-info text-light float-right mr-4 px-5 mb-1">Add</a>
     @endif
     <thead class="thead-light">
         <tr>
             <th>#</th>
             <th>title</th>
             <th>body</th>
             <th>Actions</th>
             <th>
                 <form action="{{route('filter_category')}}">
                    @csrf
            <select class="form-control" name="cat_id" onchange="this.form.submit()">
              <option value='' > category</option>
          @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach

    </select>
</form>
             </th>
         </tr>

     </thead>
     <tbody id="tbody">

        @foreach($articles as $article)
        <tr>
            <td>{{$loop->iteration}}</td>
       <td> <h4>{{$article->title}}</h4></td>
      <td>  {{$article->description}}</td>
      <td>
          {{-- @if(Auth::user()->is_admin) --}}

          <a class="btn btn-warning" href="{{route('add_comment',$article->id)}}"> Comment</a>
          {{-- @endif --}}

      </td>
    </tr>
        @endforeach

     </tbody>

 </table>
</div>

@stop








