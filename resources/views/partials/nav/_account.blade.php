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
        <li class="nav-item">
            <a class="nav-link {{ link_is_active('account/user/invites') }}" href="{{ route('account.user.invites') }}">
                Invites
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

    <h3 class="nav-heading">Plans and Billing</h3>
    @subscribed
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
            <li class="nav-item">
                <a class="nav-link {{ link_is_active('account/subscription/swap') }}" href="{{ route('account.subscription.swap') }}">
                    Change plan
                </a>
            </li>
            @endsubscriptionnotcancelled


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
        <ul class="nav flex-column nav-pills mb-4">
            <li class="nav-item text-danger">You are not currently subscribed.</li>
            <li class="nav-item">
                <a class="nav-link {{ link_is_active('account/subscribe') }}" style="text-decoration: underline;" href="{{ route('account.subscribe') }}">
                    Choose a plan!
                </a>
            </li>

        </ul>
    @endnotsubscribed


    @emailnotconfirmed
        <hr>
        <p><i data-toggle="tooltip" data-placement="left" title="Email address has not been validated." class="fas fa-exclamation-triangle text-danger"></i>
        Email unconfirmed. <a href="{{ route('account.email.resend') }}">Resend</a></p>
    @endemailnotconfirmed


</aside>
