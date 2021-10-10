@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Guests') }}</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover text-center">
                            <caption>{{ __('Guest list')}}</caption>
                            <thead class="text-uppercase">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name')}}</th>
                                <th scope="col">{{ __('Age')}}</th>
                                <th scope="col">{{ __('City')}}</th>
                                <th scope="col">{{ __('Phone')}}</th>
                                <th scope="col">{{ __('Created')}}</th>
                                <th scope="col">{{ __('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody class="">
                            @foreach($guests as $guest)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><a href="{{route('guests.show',$guest->id)}}">{{$guest->name}}</a></td>
                                    <td>{{$guest->age}}</td>
                                    <td>{{$guest->city}}</td>
                                    <td>{{$guest->phone}}</td>
                                    <td>{{$guest->created_at}}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{route('guests.edit',$guest->id)}}" class="btn btn-warning m-1">{{ __('Edit')}}</a>
                                        <a class="btn btn-danger m-1" href="{{route('guests.destroy',$guest->id)}}"
                                           onclick="event.preventDefault();
                                               document.getElementById('delete{{$guest->id}}').submit();">
                                            {{ __('Delete') }}
                                        </a>

                                        <form id="delete{{$guest->id}}" action="{{ route('guests.destroy',$guest->id)}}"
                                              method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$guests->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
