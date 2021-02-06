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
                <div class="card-header p-6">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link " href="/cleanerjobs"> <i class="fa fa-arrow-alt-circle-left"></i> Back </a></li>
                    
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <div class="post">
                          <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 200px;">
                                  <h4><p class="text-muted">Approved Jobs</p></h4>
                              </div>
                           </div>
                           <div class="card-body table-responsive p-0">
                              <table class="table table-hover">
                                  <tbody>
                                      <tr>
                                          <th><strong>Approved By <i class="fas fa-user"></i></strong></th>
                                          <th><strong>Job <i class="fas fa-envelope"></i></strong></th>
                                          <th><strong>Phone <i class="fas fa-phone"></i></strong></th>
                                          <th><strong>Job Location <i class="fas fa-map-marker"></i></strong></th>
                                        
                                          <th></th>
                                      </tr>
                                      @foreach ($viewjobs as $view)
                                        <tr>
                                          <td>{{$view->jobpost_name}}</td>
                                          <td>{{$view->jobpost_email}}</td>
                                          <td>{{$view->jobpost_phone}}</td>
                                          <td>{{$view->jobpost_address}}</td>
                                       </tr> 
                                      @endforeach
                                  </tbody>
                              </table>
                             
                          </div>
                         
                        </div>
                    </div>
                    
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
