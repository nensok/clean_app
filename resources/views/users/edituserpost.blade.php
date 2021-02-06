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
                        <div class="widget-user-header text-white" style="background-image:url('../images/bg.png')">
                            <h3 class="widget-user-username"><i class="fa fa-address-book mr-1"></i>{{ Auth::user()->name }}</h3>
                            <h5 class="widget-user-desc"><i class="fa fa-envelope mr-2"></i>{{ Auth::user()->email }}</h5>
                            <h5 class="widget-user-desc"><i class="fa fa-phone mr-2"></i>{{ Auth::user()->phone }}</h5>
                            <h5 class="widget-user-desc"><i class="fa fa-user-clock mr-2"></i>{{ Auth::user()->created_at->format('F d, Y') }}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="profile-user-img img-fluid img-circle" src="../uploads/images/{{Auth::user()->photo}}" alt="User Avatar">
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
                                
                                <span class="description-text">Edit</span>
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
    
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="btn btn-secondary" href="/useractivity" ><i class="fa fa-arrow-alt-circle-left"></i> Back</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <!-- Settings Tab -->
                      <div class="tab-pane">
                                    <br>
                                  <h3>
                                    <p class="text-muted text-center"> Update your post <i class="fas fa-edit fa-fw"></i></p>
                                  </h3>
                                  <form action="/postjob/{{$jobpost->id}}/" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control"  name="user_id" value="{{Auth::user()->id}}">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                         <div class="col-sm-12">
                                             <input type="hidden" class="form-control"  name="name" value="{{$jobpost->name}}" placeholder="Enter Name" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         
                                         <div class="col-sm-12">
                                             <input type="hidden" class="form-control"  name="email" value="{{$jobpost->email}}" placeholder="Email address" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                      
                                         <div class="col-sm-12">
                                             <input type="hidden" class="form-control"  name="phone" value="{{$jobpost->phone}}" placeholder="Phone number" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="jobtitle" class="col-sm-4 control-label">Job Title</label>
                                             <div class="col-sm-12">
                                             <input type="text" class="form-control"  name="title" value="{{$jobpost->title}}" placeholder="Job Title" required>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="address"  class="col-sm-4 control-label">Job Description</label>
                                         <div class="col-sm-12">
                                             <textarea class="form-control"  name="description" placeholder="Job Description" required>{{$jobpost->description}}</textarea>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="address"  class="col-sm-4 control-label">Job Adddress</label>
                                         <div class="col-sm-12">
                                             <textarea class="form-control"  name="address" placeholder="Enter address of the job" required>{{$jobpost->address}}</textarea>
                                         </div>
                                     </div>
                                </div>
                                 <div class="modal-footer bg-secondary">
                                     <button type="submit" class="btn btn-primary">Update <i class="fas fa-thumbs-up"></i></button>
                                 </div>
                             </form>
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
@endsection
