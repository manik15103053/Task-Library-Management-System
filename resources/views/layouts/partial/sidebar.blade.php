<div class="list-group category_item">
    @can('dashboard')
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
    @endcan
    {{-- <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('category*') ? 'active' : '' }}">Category</a>
    <a href="{{ route('blog.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('blog*') ? 'active' : '' }}">Blog</a> --}}
    @can('author.index')
    <a href="{{ route('author.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('author*') ? 'active' : '' }}">Author</a>
    @endcan
    @can('book.index')
    <a href="{{ route('book.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('book*') ? 'active' : '' }}">Book</a>
    @endcan
    @can('member.index')
    <a href="{{ route('member.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('member*') ? 'active' : '' }}">Member</a>
    @endcan
    @can('borrow.index')
    <a href="{{ route('borrow.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('borrow*') ? 'active' : '' }}">Borrow Book</a>
    @endcan
    @can('user.index')
    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('user*') ? 'active' : '' }}">User</a>
    @endcan
    @can('role.index')
    <a href="{{ route('role.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('role*') ? 'active' : '' }}">Role</a>
    @endcan
</div>
