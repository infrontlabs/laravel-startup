<aside>


    <h3 class="nav-heading">User</h3>
    <ul class="nav flex-column nav-pills mb-4">
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account') }}" href="{{ route('account.profile') }}">
            Profile
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account/password') }}" href="{{ route('account.password') }}">
            Change Password
        </a>
        </li>
    </ul>

    <h3 class="nav-heading">Account</h3>
    <ul class="nav flex-column nav-pills mb-4">
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account/settings') }}" href="{{ route('account.settings') }}">
            Settings
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account/team') }}" href="{{ route('account.team') }}">
            Manage Team
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ link_is_active('account/accounts') }}" href="{{ route('account.accounts') }}">
            Switch accounts
        </a>
        </li>
    </ul>

    @subscribed
        <h3 class="nav-heading">Plans and Billing</h3>
        <ul class="nav flex-column nav-pills mb-4">

            @subscriptionnotcancelled
            <li class="nav-item">
                <a class="nav-link {{ link_is_active('account/subscription') }}" href="{{ route('account.subscription.details') }}">
                    Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ link_is_active('account/subscription/cancel') }}" href="{{ route('account.subscription.cancel') }}">
                    Cancel subscription
                </a>
            </li>
            @endsubscriptionnotcancelled

            <li class="nav-item">
                <a class="nav-link {{ link_is_active('account/subscription/swap') }}" href="{{ route('account.subscription.swap') }}">
                    Change plan
                </a>
            </li>

            @subscriptioncancelled
            <li class="nav-item">
                <a class="nav-link {{ link_is_active('account/subscription/resume') }}" href="{{ route('account.subscription.resume') }}">
                    Resume subscription
                </a>
            </li>
            @endsubscriptioncancelled
            <li class="nav-item">
                <a class="nav-link {{ link_is_active('account/subscription/card') }}" href="{{ route('account.subscription.card') }}">
                    Update card
                </a>
            </li>
        </ul>
    @endsubscribed

    @notsubscribed
        You're not currently subscribed.
        <a href="{{ route('account.subscribe') }}">Get Started!</a>
    @endnotsubscribed


    @if (!Auth::user()->validated)
        <i data-toggle="tooltip" data-placement="left" title="Email address has not been validated." class="fas fa-exclamation-triangle text-danger"></i>
        Email unconfirmed. <a href="{{ route('account.email.resend') }}">Resend</a>
    @endif


</aside>
