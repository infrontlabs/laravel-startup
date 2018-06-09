<aside>
    <h3 class="nav-heading">Account</h3>
    <ul class="nav flex-column nav-pills mb-4">
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account') }}" href="{{ route('app.account.profile') }}">
            Profile
        </a>
        <a class="nav-link {{ link_is_active('account/settings') }}" href="{{ route('app.account.settings') }}">
            Settings
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account/billing') }}" href="{{ route('app.account.billing') }}">
            Billing
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account/subscription') }}" href="{{ route('app.account.subscription') }}">
            Subscription
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account/invite') }}" href="{{ route('app.account.invite') }}">
            Invite
        </a>
        </li>
    </ul>

    @subscribed
        <hr>
        <h3 class="nav-heading">Subscription</h3>
        <ul class="nav flex-column nav-pills mb-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('app.account.settings') }}">
                    Change plan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('app.account.settings') }}">
                    Cancel subscription
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('app.account.settings') }}">
                    Resume subscription
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('app.account.settings') }}">
                    Update card
                </a>
            </li>
        </ul>
    @endsubscribed
</aside>
