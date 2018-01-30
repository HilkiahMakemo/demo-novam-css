<ul class="nav">
    <li{!! request()->is('admin/dashboard*')? ' class="active"': '' !!}>
        <a href="/admin/dashboard">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="card text-center py-2">
      <div class="card-text text-center">CONTENT</div>
    </li>
    <li{!! request()->is('admin/pages*')? ' class="active"': '' !!}>
        <a href="/admin/pages">
            <i class="material-icons">desktop</i>
            <p>Pages</p>
        </a>
    </li>
    <li{!! request()->is('admin/media*')? ' class="active"': '' !!}>
        <a href="/admin/media">
            <i class="material-icons">cloud_upload</i>
            <p>Media</p>
        </a>
    </li>
    <li{!! request()->is('admin/theme*')? ' class="active"': '' !!}>
        <a href="/admin/theme">
            <i class="material-icons">library_books</i>
            <p>Theme</p>
        </a>
    </li>
    <li class="card text-center">
      <div class="card-text text-center">ACCOUNT</div>
    </li>
    <li{!! request()->is('admin/settings*')? ' class="active"': '' !!}>
        <a href="/admin/settings">
            <i class="material-icons">bubble_chart</i>
            <p>Settings</p>
        </a>
    </li>
    <li{!! request()->is('admin/security*')? ' class="active"': '' !!}>
        <a href="/admin/security">
            <i class="material-icons">bubble_chart</i>
            <p>Security</p>
        </a>
    </li>
    <li{!! request()->is('admin/activity*')? ' class="active"': '' !!}>
        <a href="/admin/activity">
            <i class="material-icons">bubble_chart</i>
            <p>Activity</p>
        </a>
    </li>
    <li class="active-pro">
        <a href="upgrade.html">
            <i class="material-icons">unarchive</i>
            <p>Upgrade to PRO</p>
        </a>
    </li>
</ul>
