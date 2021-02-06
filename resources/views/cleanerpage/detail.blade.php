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
                    {{--  <li class="list-group-item">
                      <b>Jobs applied</b> <a class="float-right">150</a>
                    </li>  --}}
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
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Job Detail <i class="fas fa-book-open fa-fw"></i></a></li>
                    <li class="nav-item"><a class="nav-link " href="/cleanerjobs"> <i class="fa fa-arrow-alt-circle-left"></i> Back </a></li>
                    
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <div class="post">
                          <div class="card-tools">
                              <div class="text-center" style="width: 220px;">
                                  <h4><p class="text-muted">Click <span style="color:royalblue"><i class="fas fa-thumbs-up mr-2"></span></i>to Apply for this Job</p></h4>
                              </div>
                           </div>
                           <div class="card-body table-responsive p-0">
                              <table class="table table-hover">
                                  <tbody>
                                      <tr>
                                          <th><strong>Posted By  <i class="fas fa-user"></i></strong></th>
                                          <th><strong>Email  <i class="fas fa-envelope"></i></strong></th>
                                          <th><strong>Job  <i class="fas fa-briefcase"></i></strong></th>
                                         
                                          <th></th>
                                      </tr>
                                        <tr>
                                            <td>{{$jobpost->name}}</td>
                                            <td>{{$jobpost->email}}</td>
                                            <td>{{$jobpost->title}}</td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#view"><i class="fas fa-thumbs-up"></i></button>
                                            </td>
                                        </tr>
                                      
                                     
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

<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="viewModalLabel">Click the Apply button to apply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card-body table-responsive p-0">
              <table class="table table-hover ">
                  <tbody>
                      <tr>
                        <th>Posted By</th>
                        <td>{{$jobpost->name}}</td>
                      </tr>
                      <tr>
                        <th>Job Description</th>
                        <td>{{$jobpost->description}}</td>
                      </tr>
                      <tr>
                        <th>Location</th>
                        <td>{{$jobpost->address}}</td>
                      </tr>
                      
                  </tbody>
              </table>
          </div>
          <br>
          <form action="/apply" method="post">
            @csrf
             <div class="form-group">
                 <div class="col-sm-12">
                     <input type="hidden" class="form-control"  name="cleaner_id" value="{{ Auth::user()->id }}">
                 </div>
             </div>
             <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="user_id" value="{{ $jobpost->user_id }}">
                </div>
            </div>
             <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="jobpost_id" value="{{$jobpost->id}}">
                </div>
             </div>
             <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="jobpost_name" value="{{$jobpost->name}}">
                </div>
             </div>
             <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="jobpost_phone" value="{{$jobpost->phone}}">
                </div>
             </div>
             <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="jobpost_email" value="{{$jobpost->email}}">
                </div>
             </div>
             <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control"  name="jobpost_address" value="{{$jobpost->address}}">
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
                    <input type="hidden" class="form-control"  name="phone" value="{{ Auth::user()->phone}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea class="form-control"  name="location" required placeholder="Enter Your Address"></textarea>
                </div>
            </div>
         
            <div class="modal-footer">
            </div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss <i class="fas fa-times-circle"></i></button>
            <button type="submit" class="btn btn-primary ">Apply <i class="fas fa-thumbs-up"></i></button>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
