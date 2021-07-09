@extends('main.home_master')
@section('content')
<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
						<li><a href="#">
            
           @if(session()->get('lang') == 'hindi')
		{{$postdata->category_hin}}
		@else
		{{$postdata->category_en}}
		@endif
            
            </a></li>
						<li><a href="#">
            
           @if(session()->get('lang') == 'hindi')
		{{$postdata->subcategory_hin}}
		@else
		{{$postdata->subcategory_en}}
		@endif
            
            </a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
              
           @if(session()->get('lang') == 'hindi')
		{{$postdata->title_hin}}
		@else
		{{$postdata->title_en}}
		@endif
           
            </h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
						 
						 
						 <li>{{$postdata->name}}</li>     <li><i class="fa fa-clock-o"></i> {{$postdata->post_date}}</li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
							<!-- <ul class="social-nav">
								<li><a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('#'),'facebook-share-dialog','width=626,height=436'); return false;" target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="" onclick="javascript:window.open('https://twitter.com/share?text=‘#'); return false;" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="" onclick="window.open('https://plus.google.com/share?url=#'); return false;" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" target="_blank" title="Print" rel="nofollow" class="print"><i class="fa fa-print"></i></a></li>
						
							</ul>						    -->
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{asset($postdata->Image)}}" alt="" />
					<h4 class="caption"> 
          @if(session()->get('lang') == 'hindi')
		{!!$postdata->title_hin!!}
		@else
		{!!$postdata->title_en!!}
		@endif
    
    </h4>
					<p> 
          
           
    </p>
				</div>
				<!-- ********* -->
				<div class="row">
					<div class="col-md-12"><h2 class="heading">
           @if(session()->get('lang') == 'hindi')
              सम्बंधितखबर  
              @else
              RelatedNews
           @endif
        
          
          </h2></div>
      @php
      $more = DB::table('posts')->where('category_id',$postdata->category_id)->orderBy('id','desc')->limit(3)->get();


      @endphp


           @foreach($more as $row)

					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm">
							<a href="#"><img src="{{asset($row->Image)}}" alt="Notebook"></a>
							<h4 class="heading-02"><a href="{{URL::to('view/post/'.$row->id)}}">
              @if(session()->get('lang') == 'hindi')
              {{$row->title_hin }}
              @else
              {{$row->title_en}}
           @endif
        
             
              
              </a> </h4>
						</div>
					</div>
					
					@endforeach
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
				<div class="tab-header">
					<!-- Nav tabs -->
					
					<!-- Tab panes -->
				
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
			</div>
		  </div>
		</div>
	</section>

@endsection