import React from 'react'

import DashboardHome from './pages/dashboard/Home'
import AccountProfile from './pages/account/Profile'
import ChangePassword from './pages/account/ChangePassword'
import Accounts from './pages/account/Accounts'

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
    path: '/account/accounts',
    component: Accounts
  }
]

export default routes
