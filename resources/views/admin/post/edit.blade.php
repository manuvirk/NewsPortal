@extends ('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <h4 class="card-title">Edit Posts</h4>
                    <p class="card-description">Post Form </p>

                    <form class="forms-sample" action="{{route('update.posts', $post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                     
                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">Title English</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title_en" value="{{$post->title_en}}">
                       </div>

                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">Title Hindi</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="title_hin" value="{{$post->title_hin}}">
                       </div>
                    </div>




                     <div class="row">
                     
                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">Category</label>
                       <select class="form-control" id="exampleSelectGender" name="category_id">
                       <option disabled="" selected="">--select Category</option>
                        @foreach($category as $categories)
                          <option value="{{$categories->id}}">{{$categories->category_en}}</option>
                          @endforeach
                        </select>
                       </div>

                      
                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">SubCategory</label>
                        <select class="form-control" id="subcategory_id" name="subcategory_id">
                        <option disabled="" selected="">--select SubCategory</option>
                        </select>
                       </div>
                    </div>


                     <div class="row">
                     
                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">District </label>
                       <select class="form-control" id="exampleSelectGender" name="district_id">
                       <option disabled="" selected="">--select District</option>
                       @foreach($district as $districts)
                          <option value="{{$districts->id}}">{{$districts->district_en}}</option>
                         @endforeach
                        </select>
                       </div>

                      
                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">SubDistrict</label>
                        <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                        <option disabled="" selected="">--select SubDistrict</option>
                         
                        </select>
                       </div>
                    </div>
                     

                    
                      
                      
                
                      <div class="row">
                     
                       <div class="form-group col-xs-12 ">
                        <label for="exampleFormControlFile1">Image upload</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                      </div>

                      <div class="form-group col-xs-12 ">
                        <label for="exampleFormControlFile1">old Image</label>
                        <img src="{{URL::to($post->Image)}}" style="width: 70px; height:50px;">
                        <input type="hidden"  name="oldimage" value="{{ $post->Image}}">
                      </div>
                    </div>  

                      <div class="row">
                     
                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">Tags English</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="tags_en" value="{{$post->tags_en}}">
                       </div>

                       <div class="form-group col-md-6">
                        <label for="exampleInputName1">Tags Hindi</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="tags_hin" value="{{$post->tags_hin}}">
                       </div>
                    </div>

                      
                      <div class="form-group">
                        <label for="exampleTextarea1">Details English</label>
                        <textarea class="form-control" id="summernote1" name="details_en" rows="4" value="{{$post->details_en}}"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleTextarea1">Details Hindi</label>
                        <textarea class="form-control" id="summernote" name="details_hin" rows="4" value="{{$post->details_hin}}"></textarea>
                      </div>
                    <br>
                     <hr> 
                 <h4 class="text-center">Extra</h4> 
                      <div class="row">
                     
                              <label class="form-check-label col-md-3">
                                <input type="checkbox" class="form-check-input" name="headline" value="1"> Headline <i class="input-helper"></i></label>
                    
                      
                          
                              <label class="form-check-label col-md-3">
                                <input type="checkbox" class="form-check-input" name="bigthumbnail" value="1" 
                                <?php  if($post->bigthumbnail == 1) {echo "checked";} ?>>
                                
                                
                                General Big Thumbnail
                           
                                
                                 <i class="input-helper"></i></label>
                      

                          
                              <label class="form-check-label col-md-3">
                                <input type="checkbox" class="form-check-input" name="first_section" value="1"> First Section<i class="input-helper"></i></label>
                    

                          
                              <label class="form-check-label col-md-3">
                                <input type="checkbox" class="form-check-input" name="section_thumbnail" value="1"> First Section BigThumbnail <i class="input-helper"></i></label>
                    
                      </div>
                      <br>
                      <br>
                      <button type="submit" class="btn btn-primary mr-2">update</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>



     </div>
  

<!-- this is for category  -->
  <script type="text/javascript">
   $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subcategory_id").empty();
                              $.each(data,function(key,value){
                                  $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+'</option>');
                              });

                        
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>


<!-- this is for district -->
  <script type="text/javascript">
   $(document).ready(function() {
         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
                     url: "{{  url('/get/subdistrict/') }}/"+district_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subdistrict_id").empty();
                              $.each(data,function(key,value){
                                  $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                              });
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>
 @endsection