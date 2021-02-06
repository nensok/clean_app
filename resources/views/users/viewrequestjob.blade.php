@extends('layouts.app')

@section('content')
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white" style="background-image:url('./images/bg.png')">
                            <h3 class="widget-user-username"><i class="fa fa-address-book mr-1"></i>{{ Auth::user()->name }}</h3>
                            <h5 class="widget-user-desc"><i class="fa fa-envelope mr-2"></i>{{ Auth::user()->email }}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="profile-user-img img-fluid img-circle" src="uploads/images/{{Auth::user()->photo}}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                                  
                                    </div>
                                    <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
    
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class=" btn btn-secondary" href="/useractivity"> Back <i class="fa fa-arrow-alt-circle-left"></i></i></a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  @include('inc.flashmessages')
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active show" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <h3 class="text-muted text-center mb-3">
                                    <p>Requested Jobs <i class="fas fa-bars fa-fw"></i></p>
                                </h3><br>
                                <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th><strong><i class="fas fa-address-book fa-fw mr-1"></i>Name</strong></th>
                                                    <th><strong><i class="fas fa-envelope fa-fw mr-1"></i>Email</strong></th>
                                                    <th><strong><i class="fas fa-phone fa-fw mr-1"></i>Phone</strong></th>
                                                    <th><strong><i class="fas fa-map-marker fa-fw mr-1"></i>location</strong></th>
                                                    <th><strong><i class="fas fa-calendar  mr-1"></i>Date Applied</strong></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                @if(count($viewrequest)>0)
                                                    @foreach($viewrequest as $view)
                                                    <tr>
                                                        <td>{{$view->name}}</td>
                                                        <td>{{$view->email}}</td>
                                                        <td>{{$view->phone}}</td>
                                                        <td>{{$view->location}}</td>
                                                        <td>{{$view->created_at->format('F d, Y')}}</td>    
                                                        <td>
                                                            <form action="approve/{{$view->id}}" method="post">
                                                                @csrf
                                                                @method('patch')
                                                                <input type="hidden" class="form-control"  name="approve" value="1">
                                                                <button class="btn btn-success">Approve <i class="fas fa-check"></i></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="disapprove/{{$view->id}}" method="post">
                                                                @csrf
                                                                @method('patch')
                                                                <input type="hidden" class="form-control"  name="disapprove" value="0">
                                                                <button class="btn btn-danger">Cancel <i class="fas fa-times-circle"></i></button>
                                                            </form>
                                                        </td> 
                                                    </tr>
                                                    @endforeach
                                               @else
                                               <strong><p class="text-muted center">No Job request found</p></strong>
                                               @endif
                                            </tbody>
                                        </table>
                                        {{--  {{$jobpost->links()}}     --}}
                                    </div> 
                                       
                            </div>
                            <!-- /.post -->
                      </div>
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                   
                </div>
            </div>
        </div>
           
        </div>
    </div>
  </div>
@endsection
