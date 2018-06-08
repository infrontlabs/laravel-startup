import React from 'react'
import { NavLink } from 'react-router-dom'

const AccountNav = () => {
  return (
    <div>
      <h3 className="nav-heading">Account</h3>
      <ul className="nav flex-column mb-4">
        <li className="nav-item">
          <NavLink exact className="nav-link" to="/account/profile">
            Profile
          </NavLink>
        </li>
        <li className="nav-item">
          <NavLink exact className="nav-link" to="/account/orgs">
            Organizations
          </NavLink>
        </li>
        <li className="nav-item">
          <NavLink className="nav-link" to="/account/change-password">
            Change Password
          </NavLink>
        </li>
        <li className="nav-item">
          <NavLink className="nav-link" to="/account/billing">
            Billing
          </NavLink>
        </li>

        <li className="nav-item">
          <a className="nav-link" href="/logout">
            Logout
          </a>
        </li>
      </ul>
    </div>
  )
}

export default AccountNav
