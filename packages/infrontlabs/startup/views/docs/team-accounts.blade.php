@extends('startup::docs.layout')

@section('base.content')
<h1>Team Accounts</h1>

<p>
    In a typical web application, the word user is kind of synonymous with the word account. These concepts are coupled in a one-to-one relationship. A user registers to create an account, using their email address or username to identify the account. In a sense, this is not that different in a <strong>LaravelStartup</strong> application. However, what if a user can create multiple accounts using the same identifier (username or email address) to identify them. Instead of a one-to-one relationship, it's a one-to-many - A single user can own many accounts, what we will call "team account".
</p>

<p>
	The benefit to owning multiple team accounts is that it allows a user to invite other users to collaborate and manage shared resources and subscriptions for a particular account and those users may already belong to other accounts and would not need to sign up with a different email address
	just to participate.
</p>

<p>
	For example, let's imagine that a project management application was built using LaravelStartup. As project manager for an agency, I hear about it and decide that it would be a good fit for my organization and register and subscribe. Because I have a team of developers who will need to interact with it, I want to invite them to collaborate. They each use their email address to sign up and accept my invitation. Now, let's say I have sub contractors I work with who work for an organization that has already been set up on the same application. Rather than making them sign up with a different email address, I can invite them using their existing user account to participate in my team account, giving them the access they need.
</p>

<p>
	It's important to note that each team account is responsible for managing its own subscriptions and resources. In the example of a project management application, a team account not only has it's own set of projects completely isolated from other team accounts and its own set of members, but its own subscription and the billing to support it.
</p>
@endsection
