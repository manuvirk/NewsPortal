<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('backend/assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('backend/assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{asset('backend/assets/images/faces/face15.jpg')}}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.html">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

@if(Auth::user()->category==1)
           <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('all.categories')}}"> categories </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('all.subcategories')}}"> Subcategories </a></li>
                
              </ul>
            </div>
          </li>
          
@else
@endif


@if(Auth::user()->district==1)
           <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi  mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Districts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.districts') }}"> Districts </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.subdistricts') }}"> SubDistricts </a></li>
              
              </ul>
            </div>
          </li>

@else
@endif
@if(Auth::user()->post==1)
           <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="ui-basic">

              <span class="menu-icon">
                <i class="mdi  mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Posts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="posts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.posts') }}"> All Posts </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('add.posts') }}"> Add Posts </a></li>
              
              </ul>
            </div>
          </li>
@else
@endif
@if(Auth::user()->setting==1)
<li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Settings" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Settings">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.socials') }}"> Social Settings </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.seos') }}"> Seo Setting </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.livetvs') }}"> LiveTv Setting </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.notices') }}"> Notice Settings</a></li>
              </ul>
            </div>
          </li>
@else
@endif


@if(Auth::user()->website==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Website" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi  mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Website</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Website">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('add.websites') }}"> Add Website Link </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all.websites')}}"> All Website Link </a></li>
              
              </ul>
            </div>
          </li>

@else
@endif
@if(Auth::user()->gallery==1)
              <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Gallery" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi  mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Gallery</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Gallery">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('all.photos')}}"> Photo Gallery </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('all.videos')}}"> Video Gallery </a></li>
              
              </ul>
            </div>
          </li>

@else
@endif
@if(Auth::user()->ads==1)
            <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Ads" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi  mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Ads</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Ads">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('add.ads')}}"> Add Ads </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('all.ads')}}"> All Ads </a></li>
              
              </ul>
            </div>
          </li>

@else
@endif
@if(Auth::user()->role==1)
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Roles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('addwriter')}}"> Add writer </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('allwriter')}}"> All writer </a></li>
               
              </ul>
            </div>
          </li>

@else
@endif
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>