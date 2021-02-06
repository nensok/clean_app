@extends('layouts.app-cleaner')

@section('content')
<section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="uploads/images/{{Auth::user()->photo}}" alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                  <br>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Jobs applied</b> <a class="float-right">150</a>
                    </li>
                    <li class="list-group-item">
                      <a href="/approvedjobs"><b>Jobs approved</b></a> <a class="float-right">20</a>
                    </li>
                  </ul>
  
                  {{-- <a href="#" class="btn btn-primary btn-block"><b>Back</b></a> --}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fa fa-address-book mr-1"></i>Name</strong>
  
                  <h4 class="text-muted">
                    {{ Auth::user()->name }}
                  </h4>
  
                  <hr>

                  <strong><i class="fa fa-user-clock mr-1"></i>Member Since</strong>
  
                  <p class="text-muted"> {{ Auth::user()->created_at->format('F d, Y') }}</p>
  
                  <hr>
  
                  <strong><i class="fa fa-envelope mr-1"></i>Email</strong>
  
                  <p class="text-muted"> {{ Auth::user()->email }}</p>
  
                  <hr>
  
                  <strong><i class="fa fa-phone mr-1"></i>Contact</strong>
  
                  <p class="text-muted">
                        {{ Auth::user()->phone }}
                  </p>
  
                  
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-7 container">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link " href="/cleanerjobs">Jobs Listing <i class="fas fa-bars fa-fw"></i></a></li>
                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline <i class="fas fa-user-friends fa-fw"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">User Settings <i class="fas fa-user-cog fa-fw"></i></a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    
                    <!-- /.tab-pane -->
                    <div class="active tab-pane" id="timeline">
                        <h2> Chats Coming soon...</h2>
                    </div>

                    <!-- /.tab-pane -->
  
                    <div class="tab-pane" id="settings">
                        <h3 class="text-muted text-center mb-3">
                            <p> Update your profile <i class="fas fa-user-edit fa-fw"></i></p>
                          </h3>
                        <form method="POST" action="/updatecleaner/{{Auth::user()->id}}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Full Name</label>
            
                                <div class="col-sm-12">
                                    <input type="text"  class="form-control"  name="name" value="{{ Auth::user()->name }}" placeholder="Full Name">
                                        
                                </div>
                            </div>
                                 
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
            
                                <div class="col-sm-12">
                                    <input type="email"  class="form-control"  name="email" value="{{ Auth::user()->email }}" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Phone Number</label>
            
                                <div class="col-sm-12">
                                   <input type="text"  class="form-control"  name="phone" value="{{ Auth::user()->phone }}" placeholder="Phone Number">
                                </div>
                            </div>
                                  
                            <div class="form-group">
                                <label for="photo" class="col-sm-2 control-label">Profile photo</label>
            
                                <div class="col-sm-12">
                                    <input type="file"  name="photo" class="form-control-file" >
                                </div>
                            </div>
                            <div class="form-group">            
                                <div class="col-sm-12">
                                    <input type="hidden" class="form-control"  name="role_id" value="{{ Auth::user()->role_id }}">
                                </div>
                            </div>
                                  
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                      <button  type="submit" class="btn btn-primary"> Update Info <i class="fas fa-user-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      <div>
         
      </div>
  </div>
</section>
@endsection
