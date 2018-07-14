<aside>


    <h3 class="nav-heading">Introduction</h3>
    <ul class="nav flex-column nav-pills mb-4">
        <li class="nav-item">
            @component('components.routenav', ['route' => 'docs.index'])
                Overview
            @endcomponent
        </li>
        <li class="nav-item">
            @component('components.routenav', ['route' => 'docs.page', 'param' => 'getting-started'])
                Getting Started
            @endcomponent
        </li>
    </ul>

</aside>
