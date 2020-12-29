<header class="header" id="header">
  <div class="normal-version">
    <div class="header__toggle">
      <i class="bx bx-menu" id="header-toggle"></i>
    </div>

    <div class="header__user">

      <img src="/images/{{Auth::user()->employee->path}}" alt="profile" class="header__img mr-3" />

      <button class="header__user-data dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false" id="navbarDropdownMenuLink">
        <span>{{Auth::user()->employee->name}}</span>
      </button>

      <div class="dropdown-menu dropdown-menu-right mt-2 user-profile__dropdown">
        <button class="dropdown-item d-flex" type="button" data-toggle="modal" data-target="#showProfile">
          <i class="bx bxs-user-circle bx-sm mr-2"></i>
          My Profile
        </button>


        <button class="dropdown-item d-flex" data-toggle="modal" data-target="#logout">
          <i class="bx bx-log-out bx-sm mr-2"></i>
          Logout
        </button>

        </a>

      </div>
    </div>
  </div>
</header>

<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div>
      <div class="mb-4 mt-1 d-flex" style="margin-left: 0.6rem">
        <img src="/assets/img/logo1.jpeg" style="width:23%; border-radius:50%">
        <span class=" ml-3 mt-2 text-white"><b>PaidLeavy</b></span>
      </div>

      <div class="nav__list">
        <div class="nav__item">
          <li>
            <a href="{{Route('admin.home')}}" class="nav__link" title="Dashboard">
              <i class="bx bx-grid-alt nav__icon"></i>
              <span class="nav__name">Dashboard</span>
            </a>
          </li>
        </div>

        <div class="nav__item">
          <li>
            <a href="#masterdata" class="nav__link " title="Masterdata" data-toggle="collapse">
              <i class="bx bxs-data"></i>
              <span class="nav__name dropdown-toggle">Masterdata</span>
            </a>
            <ul class="collapse list-unstyled masterdata__list" id="masterdata">
              <li>
                <a href="{{Route('admin.employee.index')}}" class="text-white masterdata__list-item">Employee</a>
              </li>
              <li><a href="{{Route('admin.department.index')}}" class="text-white masterdata__list-item">Department</a>
              </li>
              <li><a href="{{Route('admin.position.index')}}" class="text-white masterdata__list-item">Position</a>
              </li>
            </ul>
          </li>
        </div>

        <div class="nav__item">
          <li>
            <a href="#cuti-karyawan" class="nav__link" title="Cuti Karyawan" data-toggle="collapse">
              <i class="bx bx-user nav__icon"></i>
              <span class="nav__name dropdown-toggle">Employee Leave</span>
            </a>

            <ul class="collapse list-unstyled cuti-karyawan__list" id="cuti-karyawan">
              <li><a href="{{Route('admin.pendingLeave.index')}}" class="text-white masterdata__list-item">Pending
                  Leave</a></li>
              <li><a href="{{Route('admin.leaveList.index')}}" class="text-white masterdata__list-item">Leave List</a>
              </li>
            </ul>
          </li>
        </div>
      </div>
    </div>
    <a href="#" class="nav__link" title="Logout" data-toggle="modal" data-target="#logout">
      <i class="bx bx-log-out nav__icon"></i>
      <span class="nav__name">Log Out</span>
    </a>
  </nav>
</div>