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

    <h3 class="nav-heading">How It Works</h3>
    <ul class="nav flex-column nav-pills mb-4">
        <li class="nav-item">
            @component('components.routenav', ['route' => 'docs.page', 'param' => 'organization'])
                Organization
            @endcomponent
        </li>
        <li class="nav-item">
            @component('components.routenav', ['route' => 'docs.page', 'param' => 'testing'])
                Testing
            @endcomponent
        </li>
        <li class="nav-item">
            @component('components.routenav', ['route' => 'docs.page', 'param' => 'team-accounts'])
                Team Accounts
            @endcomponent
        </li>
        <li class="nav-item">
            @component('components.routenav', ['route' => 'docs.page', 'param' => 'billing'])
                Billing
            @endcomponent
        </li>
    </ul>

</aside>
