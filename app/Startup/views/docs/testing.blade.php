@extends('startup::docs.layout')

@section('base.content')
<h1>Testing</h1>
<p>
    You can find all available LaravelStartup tests in the <code>app\Startup\tests</code> folder.
</p>
<p>
    PHPUnit has been configured to look for tests there so, just run your tests normally: <br />
    <code>
        > phpunit
    </code>

    Or if you are using lando:<br>
    <code>
        > lando composer test
    </code>
</p>
@endsection
