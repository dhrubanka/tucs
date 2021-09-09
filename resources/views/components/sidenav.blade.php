<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file"></span>
            Projects
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="shopping-cart"></span>
            Events
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Blog
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Forum
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span> Users</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">

        <li class="nav-item">

            <button class="nav-link btn  collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="true">
              <span data-feather="users"></span>
              User Management
            </button>

            <div class="collapse show" id="users-collapse">
              <ul  >
                  <li><a href="/users" class="nav-link  rounded">All Users</a></li>
                  <li><a href="/users/create" class="nav-link   rounded">Create User</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">

            <button class="nav-link btn  collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="true">
              <span data-feather="users"></span>
              Profile Management
            </button>

            <div class="collapse show" id="users-collapse">
              <ul  >
                  <li><a href="/users" class="nav-link  rounded">All Users</a></li>
                  <li><a href="/users/create" class="nav-link   rounded">Convert User</a></li>
              </ul>
            </div>
          </li>
      </ul>
    </div>
  </nav>
