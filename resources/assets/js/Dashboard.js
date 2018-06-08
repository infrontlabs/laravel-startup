import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter as Router, Route, NavLink } from 'react-router-dom'

import AccountNav from './account/components/AccountNav'
import routes from './routes'

export default class Dashboard extends Component {
  logout() {
    window.axios.post(this.props.session.routes.logout)
  }

  render() {
    return (
      <Router basename="/dashboard">
        <div>
          <nav
            className="navbar navbar-expand-lg navbar-light navbar-laravel"
            style={{ backgroundColor: 'white' }}
          >
            <div className="container">
              <a className="navbar-brand" href={this.props.session.routes.home}>
                <strong>Laravel</strong>
                <span>Saas</span>
              </a>

              <div
                className="collapse navbar-collapse"
                id="navbarSupportedContent"
              >
                <ul className="navbar-nav mr-auto" />

                <ul className="navbar-nav ml-auto">
                  <li className="nav-item dropdown">
                    <a id="navbarDropdown" className="nav-link" href="#">
                      {this.props.session.user.name}
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <main className="py-4">
            <div className="container">
              <div className="row">
                <div className="col-3">
                  <aside>
                    <h3 className="nav-heading">Dashboard</h3>
                    <ul className="nav flex-column mb-4">
                      <li className="nav-item">
                        <NavLink exact className="nav-link" to="/">
                          Link 1
                        </NavLink>
                      </li>
                      <li className="nav-item">
                        <NavLink className="nav-link" to="/link2">
                          Link 2
                        </NavLink>
                      </li>
                      <li className="nav-item">
                        <NavLink className="nav-link" to="/link3">
                          Link 3
                        </NavLink>
                      </li>
                    </ul>

                    <AccountNav />
                  </aside>
                </div>
                <div className="col-9">
                  {routes.map(({ exact, path, component: C }) => {
                    return (
                      <Route
                        key={path}
                        exact={exact}
                        path={path}
                        render={() => <C session={this.props.session} />}
                      />
                    )
                  })}
                </div>
              </div>
            </div>
          </main>
        </div>
      </Router>
    )
  }
}

if (document.getElementById('app')) {
  ReactDOM.render(
    <Dashboard session={window.Laravel} />,
    document.getElementById('app')
  )
}
