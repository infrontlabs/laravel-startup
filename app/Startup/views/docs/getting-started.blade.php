@extends('layouts.docs')

@section('base.content')
<h1>Getting Started</h1>

<p>
    <strong>LaravelStartup</strong> was developed in <a href="https://docs.devwithlando.io/">Lando</a>, which in our opinion is pretty darn awesome and we believe you
will like it too. Of course, from a development standards point of view, you are free to develop using
any environment that supports regular PHP/Laravel development. Lando just happens to be the simplist way
to get started quickly, in our opinion. Go <a href="https://docs.devwithlando.io/">read</a> what they are about.
</p>

<p>
    There really isn't a lot to do to get started. Just clone the repo and spin up a environment of your choice - Docker, Lando, Homestead, etc.
    Make sure you copy the provided <code>.env.example</code> to <code>.env</code>.
</p>

<h3>With Lando</h3>

<p>
    If you are using Lando, the project includes a `.lando.yml` file that configures your
    enviroment for you. It creates the webserver (nginx), database (mysql), and mail server (mailhog).
</p>

<p>
    When ready, simply run <code>> lando start</code>. When Lando finishes building, you will have the following services:
    <ul>
        <li>
            App Server (nginx/php) running on <code>http://startup.lndo.site</code>
        </li>
        <li>
            Database (Mysql) running on <code>localhost:3307</code>
        </li>
        <li>
            SMTP (Mailhog) running on <code>http://mail.startup.lndo.site</code>
        </li>
    </ul>
</p>

<h3>Without Lando</h3>
<p>
    If you are not using Lando, you will need to create the above services yourself then update your .env
    settings to reflect those changes.
</p>

<h3>Stripe Integration</h3>

<p>
    Create an account on Stripe then copy and paste your keys into <code>.env</code>:

    <code><pre>
STRIPE_KEY=pk_test_abc12345
STRIPE_SECRET=sk_test_xyz32145
    </pre></code>
</p>


@endsection
