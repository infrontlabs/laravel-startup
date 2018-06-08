import React from 'react'

import DashboardHome from './pages/dashboard/Home'
import AccountProfile from './pages/account/Profile'
import ChangePassword from './pages/account/ChangePassword'
import Organizations from './pages/account/Organizations'

const routes = [
  {
    exact: true,
    path: '/',
    component: DashboardHome
  },
  {
    exact: null,
    path: '/account/profile',
    component: AccountProfile
  },
  {
    exact: null,
    path: '/account/change-password',
    component: ChangePassword
  },
  {
    exact: null,
    path: '/account/orgs',
    component: Organizations
  }
]

export default routes
