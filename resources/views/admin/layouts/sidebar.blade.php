 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="{{URL::asset('/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Samriddha Gram</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
         <li class="nav-item">
           <a href="{{url('admin/menu')}}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>Menu</p>
           </a>
         </li>


         <li class="nav-item">
           <a href="{{ route('training.index') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>Training Calender</p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{ route('youtube.index') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>Youtube Link</p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{ route('home_gallery.index') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>Home Gallery</p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{ route('home_intro.index') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>Home Intro</p>
           </a>
         </li>

       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
