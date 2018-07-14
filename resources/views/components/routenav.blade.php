<a class="nav-link {{ link_is_active(route($route, $param ?? null, false)) }}" href="{{ route($route, $param ?? null) }}">
    {{ $slot }}
</a>
