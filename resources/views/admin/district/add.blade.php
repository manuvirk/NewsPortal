@extends ('admin.admin_master')
@section('admin')

  <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Easy News Website</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="/" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Visit News Site</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add District</h4>
                 
                    <form class="forms-sample" method="POST" action="{{route('store.districts')}}">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">District English</label>
                        <input type="text" class="form-control" id="district_en" name="district_en" placeholder="District English">
                        @error('district_en')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">District Hindi</label>
                        <input type="text" class="form-control" id="district_hin" name="district_hin" placeholder="District Hindi">
                           @error('district_hin')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
@endsection