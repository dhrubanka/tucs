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

          <button class="nav-link btn collapsed" data-bs-toggle="collapse" data-bs-target="#event-collapse" aria-expanded="true">
              <span data-feather="layers"></span>
       Events <i class="fas fa-caret-down"></i>
          </button>

          <div class="collapse" id="event-collapse">
            <ul  >
                <li><a href="/event/list" class="nav-link rounded">View Events</a></li>
                <li><a href="/event/create" class="nav-link rounded">Create Events</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Blog
          </a>
        </li>

        <li class="nav-item">

            <button class="nav-link btn  collapsed" data-bs-toggle="collapse" data-bs-target="#forum-collapse" aria-expanded="true">
                <span data-feather="layers"></span>
         Forum <i class="fas fa-caret-down"></i>
            </button>

            <div class="collapse" id="forum-collapse">
              <ul  >
                  <li><a href="/parent-community" class="nav-link  rounded">Parent Communities</a></li>
                  <li><a href="/community" class="nav-link   rounded">Communities</a></li>
              </ul>
            </div>
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
              User Management <i class="fas fa-caret-down"></i>
            </button>

            <div class="collapse" id="users-collapse">
              <ul  >
                  <li><a href="/users" class="nav-link  rounded">All Users</a></li>
                  <li><a href="/users/create" class="nav-link   rounded">Create User</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">

            <button class="nav-link btn  collapsed" data-bs-toggle="collapse" data-bs-target="#profile-collapse" aria-expanded="true">
              <span data-feather="users"></span>
              Profile Management <i class="fas fa-caret-down"></i>
            </button> 

            <div class="collapse" id="profile-collapse">
              <ul  >
                  <li><a href="/users" class="nav-link  rounded">All Users</a></li>
                  <li><a href="/users/create" class="nav-link   rounded">Convert User</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">

            <button class="nav-link btn  collapsed" data-bs-toggle="collapse" data-bs-target="#skillset-collapse" aria-expanded="true">
              <span data-feather="users"></span>
              Skill Management <i class="fas fa-caret-down"></i>
            </button>

            <div class="collapse" id="skillset-collapse">
              <ul  >
                  <li><a href="/skillset" class="nav-link  rounded">All Skills</a></li>
              </ul>
            </div>
          </li>
      </ul>
    </div>
  </nav>
