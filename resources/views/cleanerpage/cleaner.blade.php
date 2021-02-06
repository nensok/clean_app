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
                @include('inc.flashmessages')
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Jobs Listing <i class="fas fa-bars fa-fw"></i></a></li>
                    <li class="nav-item"><a class="nav-link " href="/home"> <i class="fa fa-arrow-alt-circle-left"></i> Back </a></li>
                    
                  </ul>
                </div><!-- /.card-header -->
               
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <div class="post">
                          <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 150px;">
                                  <h4><p class="text-muted">Job Listings</p></h4>
                              </div>
                           </div>
                           <div class="card-body table-responsive p-0">
                              <table class="table table-striped table-hover">
                                  <tbody>
                                      <tr>
                                          <th><strong>Job</strong></th>
                                          <th><strong>Description</strong></th>
                                          <th><strong>Date Posted</strong></th>
                                          <th><strong>Detail</strong></th>
                                      </tr>
                                      @if(count($jobpost)>0)
                                      @foreach($jobpost as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->description}}</td>
                                            <td>{{$post->created_at->format('F d, Y') }}</td>    
                                            <td>
                                                <a href="/jobdetail/{{$post->id}}" class="btn btn-default"><span style="color:royalblue"><i class="fas fa-check-circle"></i></span></a>
                                            </td>
                                        </tr>
                                      @endforeach
                                      @else
                                        <strong><p class="text-muted center">No Avilable Jobs</p></strong>
                                      @endif
                                  </tbody>
                              </table>
                             <br>
                          </div>
                          {{$jobpost->links()}}
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
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Job Details  <i class="fas fa-book"></i></h5>
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
                        <td>{{$post->name}}</td>
                      </tr>
                      <tr>
                        <th>Job Description</th>
                        <td>{{$post->description}}</td>
                      </tr>
                      <tr>
                        <th>Location</th>
                        <td>{{$post->address}}</td>
                      </tr>
                      
                  </tbody>
              </table>
          </div>
          <br>
          <form action="/new" method="post">
            @csrf
             <div class="form-group">
                 <label for="name" class="col-sm-2 control-label">Name</label>
                 <div class="col-sm-12">
                     <input type="text" class="form-control"  name="name" placeholder="Enter Name" required>
                 </div>
             </div>
             <div class="form-group">
                 <label for="name" class="col-sm-2 control-label">Email</label>
                 <div class="col-sm-12">
                     <input type="email" class="form-control"  name="email" placeholder="Email address" required>
                 </div>
             </div>
             <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control"  name="phone" placeholder="Phone Number" required>
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
