    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">Saiful Islam </p>
          <p class="app-sidebar__user-designation">Fullstack Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item active" href="{{route('admin.index')}}"
            ><i class="app-menu__icon fa fa-dashboard"></i
            ><span class="app-menu__label">Dashboard</span></a
          >
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-laptop"></i
            ><span class="app-menu__label">Banner</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a
                class="treeview-item"
                href="{{route('banner.index')}}"
                rel="noopener"
                ><i class="icon fa fa-circle-o"></i>Mange Banner</a
              >
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-laptop"></i
            ><span class="app-menu__label">Product</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{route('product.create')}}"
                ><i class="icon fa fa-circle-o"></i> ADD Product</a
              >
            </li>
            <li>
              <a
                class="treeview-item"
                href=""
                rel="noopener"
                ><i class="icon fa fa-circle-o"></i>Mange Product</a
              >
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-laptop"></i
            ><span class="app-menu__label">Brand</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{route('brand.create')}}"
                ><i class="icon fa fa-circle-o"></i> ADD Brand</a
              >
            </li>
            <li>
              <a
                class="treeview-item"
                href=""
                rel="noopener"
                ><i class="icon fa fa-circle-o"></i>Mange Brand</a
              >
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-edit"></i
            ><span class="app-menu__label">Categories</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{ route('category.create')}}"
                ><i class="icon fa fa-circle-o"></i> ADD Categories</a
              >
            </li>
            <li>
              <a class="treeview-item" href=""
                ><i class="icon fa fa-circle-o"></i>Manage Categories</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-edit"></i
            ><span class="app-menu__label">Division</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{route('division.create')}}"
                ><i class="icon fa fa-circle-o"></i> ADD Division</a
              >
            </li>
            <li>
              <a class="treeview-item" href=""
                ><i class="icon fa fa-circle-o"></i>Manage Division</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-edit"></i
            ><span class="app-menu__label">District</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{route('districs.create')}}"
                ><i class="icon fa fa-circle-o"></i> ADD District</a
              >
            </li>
            <li>
              <a class="treeview-item" href=""
                ><i class="icon fa fa-circle-o"></i>Manage District</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-th-list"></i
            ><span class="app-menu__label">Tables</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="table-basic.html"
                ><i class="icon fa fa-circle-o"></i> Basic Tables</a
              >
            </li>
            <li>
              <a class="treeview-item" href="table-data-table.html"
                ><i class="icon fa fa-circle-o"></i> Data Tables</a
              >
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview"
            ><i class="app-menu__icon fa fa-file-text"></i
            ><span class="app-menu__label">Pages</span
            ><i class="treeview-indicator fa fa-angle-right"></i
          ></a>
          <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="blank-page.html"
                ><i class="icon fa fa-circle-o"></i> Blank Page</a
              >
            </li>
            <li>
              <a class="treeview-item" href="page-login.html"
                ><i class="icon fa fa-circle-o"></i> Login Page</a
              >
            </li>
            <li>
              <a class="treeview-item" href="page-lockscreen.html"
                ><i class="icon fa fa-circle-o"></i> Lockscreen Page</a
              >
            </li>
            <li>
              <a class="treeview-item" href="page-user.html"
                ><i class="icon fa fa-circle-o"></i> User Page</a
              >
            </li>
            <li>
              <a class="treeview-item" href="page-invoice.html"
                ><i class="icon fa fa-circle-o"></i> Invoice Page</a
              >
            </li>
            <li>
              <a class="treeview-item" href="page-calendar.html"
                ><i class="icon fa fa-circle-o"></i> Calendar Page</a
              >
            </li>
            <li>
              <a class="treeview-item" href="page-mailbox.html"
                ><i class="icon fa fa-circle-o"></i> Mailbox</a
              >
            </li>
            <li>
              <a class="treeview-item" href="page-error.html"
                ><i class="icon fa fa-circle-o"></i> Error Page</a
              >
            </li>
          </ul>
        </li>
      </ul>
    </aside>
