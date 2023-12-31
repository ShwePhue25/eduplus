 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Edu<sup>+</sup>Admin</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa-solid fa-user-plus"></i>
             <span>Members</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Teachers:</h6>
                 <a class="collapse-item" href="{{route('teachers.index')}}">
                     <i class="fa-solid fa-user-group"></i>
                     Teacher Lists
                 </a>
                 <a class="collapse-item" href="{{route('teachers.create')}}">
                     <i class="fa-solid fa-square-plus mr-1"></i> Create Teacher
                 </a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Product Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fa-brands fa-product-hunt"></i>
             <span>Product</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Product:</h6>
                 <a class="collapse-item" href="{{ route('courses.index') }}"><i
                         class="fa-solid fa-layer-group mr-1"></i>Product Lists</a>
                 <a class="collapse-item" href="{{ route('courses.create') }}"><i
                         class="fa-solid fa-square-plus mr-1"></i>Add Product</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Category Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
             aria-expanded="true" aria-controls="collapseCategory">
             <i class="fa-solid fa-cross"></i>
             <span>Category</span>
         </a>
         <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Category:</h6>
                 <a class="collapse-item" href="{{ route('categories.index') }}"><i
                         class="fa-solid fa-list mr-1"></i>Category Lists</a>
                 <a class="collapse-item" href="{{ route('categories.create') }}"><i
                         class="fa-solid fa-square-plus mr-1"></i>Create Category</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Subcategory Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubcategory"
            aria-expanded="true" aria-controls="collapseSubcategory">
            <i class="fa-solid fa-cross"></i>
            <span>Subcategory</span>
        </a>
        <div id="collapseSubcategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subcategory:</h6>
                <a class="collapse-item" href="{{route('subcategories.index')}}"><i
                        class="fa-solid fa-list mr-1"></i>Subcategory Lists</a>
                <a class="collapse-item" href="{{route('subcategories.create')}}"><i
                        class="fa-solid fa-square-plus mr-1"></i>Create Subcategory</a>
            </div>
        </div>
    </li>

     <!-- Nav Item - Levels Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLevels"
             aria-expanded="true" aria-controls="collapseLevels">
             <i class="fa-solid fa-turn-up"></i>
             <span>Levels</span>
         </a>
         <div id="collapseLevels" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Level:</h6>
                 <a class="collapse-item" href="{{ route('levels.index') }}"><i
                         class="fa-solid fa-layer-group mr-1"></i>Level Lists</a>
                 <a class="collapse-item" href="{{ route('levels.create') }}"><i
                         class="fa-solid fa-square-plus mr-1"></i>Add Level</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Sections Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSections"
             aria-expanded="true" aria-controls="collapseSections">
             <i class="fa-solid fa-section"></i>
             <span>Sections</span>
         </a>
         <div id="collapseSections" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Section:</h6>
                 <a class="collapse-item" href="{{ route('sections.index') }}"><i
                         class="fa-solid fa-layer-group mr-1"></i>Section Lists</a>
                 <a class="collapse-item" href="{{ route('sections.create') }}"><i
                         class="fa-solid fa-square-plus mr-1"></i>Add Section</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Classes Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses"
             aria-expanded="true" aria-controls="collapseClasses">
             <i class="fa-solid fa-school"></i>
             <span>Classes</span>
         </a>
         <div id="collapseClasses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Class:</h6>
                 <a class="collapse-item" href="{{ route('classes.index') }}"><i
                         class="fa-solid fa-school mr-1"></i>Class Lists</a>
                 <a class="collapse-item" href="{{ route('classes.create') }}"><i
                         class="fa-solid fa-square-plus mr-1"></i>Add Class</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Addons
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
             aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Pages</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Login Screens:</h6>
                 <a class="collapse-item" href="{{ route('admin.login') }}">Login</a>
                 <a class="collapse-item" href="{{ route('admin.register') }}">Register</a>
                 <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                 <div class="collapse-divider"></div>
                 <h6 class="collapse-header">Other Pages:</h6>
                 <a class="collapse-item" href="404.html">404 Page</a>
                 <a class="collapse-item" href="blank.html">Blank Page</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span>
         </a>
     </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="tables.html">
             <i class="fas fa-fw fa-table"></i>
             <span>Tables</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>
 <!-- End of Sidebar -->
