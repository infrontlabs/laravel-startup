# InFront Startup

A Laravel based multi-tenent platform for your next SaaS.

- Multi-Tenant
- Team Billing
- Connects to Stripe
- Configure plans
- Manage users and roles
- API Authentication for your mobile app or SPA
- Stripe Webhook Ready

## Easy environment bootstrap with Lando

The quickest and easist way to get your environment up and running is to use Lando. Please, see their website to get it installed and configured.

https://docs.devwithlando.io/

Once up and running, clone the repo and cd into the root of the project. Then run:

```
> lando start
```

When lando finishes, you will have the following services:

- Website

  - http://startup.lndo.site
  - https://startup.lndo.site

- Database

  - localhost:3307

- Mailhog
  - http://mail.startup.lndo.site
  - https://mail.startup.lndo.site
