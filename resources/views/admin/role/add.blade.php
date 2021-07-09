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
                    <h4 class="card-title">Insert User Role</h4>
                 
                    <form class="forms-sample" method="POST" action="{{route('store.writer')}}">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" >
                        
                      </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Category Hindi">
                          
                      </div>


                       <div class="form-group">
                        <label for="exampleInputUsername1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Category Hindi">
                          
                      </div>

                     <div class="row">
                     
                     <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="category" value="1"> category <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-success">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="district" value="1"> district <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-info">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="post" value="1"> post <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="setting" value="1"> setting <i class="input-helper"></i></label>
                            </div>
                              </div>
                        </div>

                            <div class="col-md-6">
                          <div class="form-group">
                             <div class="form-check form-check-info">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="website" value="1"> website <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="gallery" value="1"> gallery <i class="input-helper"></i></label>
                            </div>

                              <div class="form-check form-check-info">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="ads" value="1"> ads <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="role" value="1"> role <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                     
                     </div>


                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
@endsection