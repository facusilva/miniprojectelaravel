@extends('layouts.master')

@section('content');

	<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir película
         </div>
         <div class="card-body" style="padding:30px">

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif
            <form action="{{ url('/catalog/create'  ) }}" method="post">

                {{ csrf_field() }}

            <div class="form-group">
               <label for="title">Título</label>
               <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
            </div>

            <div class="form-group">
               <label for="year">Año</label>
               <input type="text" name="year" id="year" class="form-control" value="{{old('year')}}">
            </div>

            <div class="form-group">
               <label for="director">Director</label>
               <input type="text" name="director" id="director" class="form-control"value="{{old('director')}}">
            </div>

            <div class="form-group">
               <label for="año">Poster</label>
               <input type="text" name="poster" id="año" class="form-control" value="{{old('poster')}}">
            </div>

            <div class="form-group">
               <label for="synopsis">Resumen</label>
               <textarea name="synopsis" id="synopsis" class="form-control" rows="3" >{{old('synopsis')}}</textarea>
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Añadir película
               </button>
            </div>
            
            </form>
            

         </div>
      </div>
   </div>
</div>
	
@stop