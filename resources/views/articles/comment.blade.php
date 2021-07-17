@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{route('store_comment',$article->id)}}" method="post">
    @csrf
<table class="table table-striped ">
     <thead class="thead-inverse">
       <tr>
            <th></th>
            <th></th>
            <th><a href="{{route('articles')}}"  class=" btn btn-info text-light">back</a></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Title</td><td>{{$article->title}}</td>
            </tr>
            <tr>
                <td rowspan="2"><h5 class="font-weight-bold">description</h5></td><td rowspan="2">{{$article->description}}</td>
            </tr>
            <tr>

            </tr>
        </tr>
        <td>
            <h4 class="font-weight-bold">comments</h4>
        @foreach($comments as $comment)
       <h6 class="font-weight-bold text-danger"> {{$comment->user->name}} :</h6> {{$comment->description}} <br>
        @endforeach
        </td>
        <td></td>
        </tr>
<tr>
    <td colspan="2" >
    <textarea name="comment" class="form-control"rows="5" >
    </textarea>
    <button class="btn btn-info my-3 text-light float-right" type="submit">comment</button>

    <td></td>

        </tbody>
</table>

</form>
</div>

@endsection


