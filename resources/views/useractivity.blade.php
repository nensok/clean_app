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
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                               
                                <span class="description-text">POSTS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    @include('inc.flashmessages')
                    <div class="card">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active show" href="#activity" data-toggle="tab"><i class="fas fa-user"></i> Activity</a></li>
                                <li class="nav-item"><a class="nav-link " href="#Approve" data-toggle="modal">Approved  <i class="fas fa-check-circle"></i></a></li>
                                <li class="nav-item"><a class="nav-link " href="/viewrequest">View Request <i class="fas fa-book-open"></i></a></li>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#AddNew">Add Job <i class="fas fa-plus"></i></button>
                                
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane active show" id="activity">
                                      <!-- Post -->
                                      <div class="post">
                                            <div class="card-tools">
                                                    <div class="input-group input-group-sm" style="width: 150px;">
                                                        <h3 class="text-muted text-center"><p>My Post</p></h3>
                                                    </div>
                                                </div>
                                                    <div class="card-body table-responsive p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Job</th>
                                                                    <th>Date</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                                @if(count($jobpost)>0)
                                                                    @foreach($jobpost as $post)
                                                                    <tr>
                                                                        <td>{{$post->name}}</td>
                                                                        <td>{{$post->email}}</td>
                                                                        <td>{{$post->title}}</td>
                                                                        <td>{{$post->created_at->format('F d, Y')}}</td>    
                                                                        <td>
                                                                            <a href="/editjobpost/{{$post->id}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                                        </td> 
                                                                        <td>
                                                                            <form action="/postjob/{{$post->id}}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                               @else
                                                               <strong><p class="text-muted center">No Post Found</p></strong>
                                                               @endif
                                                            </tbody>
                                                        </table>
                                                        {{--  {{$jobpost->links()}}     --}}
                                                    </div>    
                                      </div>
                                      <!-- /.post -->
                                </div>
                                <!-- viewRequest Tab -->
                                <div class="tab-pane" id="viewrequest">
                                      <h3 class="text-muted text-center mb-3">
                                        <p> View Request <i class="fas fa-book-open fa-fw"></i></p>
                                    </h3>
                                </div>
                                
                                </div>
                                
                                
                                <!-- /.tab-pane -->
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

  <!-- modal posting job --->
  <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="AddNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="AddNewModalLabel">Post a Job request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/postjob" method="post">
           @csrf
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="user_id" value="{{ Auth::user()->id }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="name" value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="email" value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="phone" value="{{ Auth::user()->phone }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jobtitle" class="col-sm-4 control-label">Job Title</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control"  name="title" placeholder="Job Title" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address"  class="col-sm-4 control-label">Job Description</label>
                <div class="col-sm-12">
                    <textarea class="form-control"  name="description" placeholder="Job Description" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="address"  class="col-sm-4 control-label">Job Adddress</label>
                <div class="col-sm-12">
                    <textarea class="form-control"  name="address" placeholder="Enter address of the job" required></textarea>
                </div>
            </div>
       </div>
        <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fas fa-times-circle"></i></button>
            <button type="submit" class="btn btn-primary">Submit <i class="fas fa-check-circle"></i></button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="Approve" tabindex="-1" role="dialog" aria-labelledby="ApproveLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="AddNewModalLabel">Post a Job request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Approve table here
      </div>
      <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i class="fas fa-times-circle"></i></button>  
      </div>
    
    </div>
  </div>
</div>
@endsection
