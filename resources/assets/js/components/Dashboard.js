import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter as Router, Route, NavLink } from 'react-router-dom'

const Home = () => (
  <div>
    <h2>Home</h2>
  </div>
)

const Settings = () => (
  <div>
    <h2>Settings</h2>
  </div>
)

export default class Dashboard extends Component {
  render() {
    return (
      <Router>
        <div>
          <nav
            className="navbar navbar-expand-lg navbar-light mb-3"
            style={{ backgroundColor: 'white' }}
          >
            <div className="container">
              <a className="navbar-brand" href="#">
                LaravelSass
              </a>

              <div
                className="collapse navbar-collapse"
                id="navbarSupportedContent"
              >
                <ul className="navbar-nav mr-auto" />

                <ul className="navbar-nav ml-auto">
                  <li className="nav-item dropdown">
                    <a id="navbarDropdown" className="nav-link" href="#">
                      {this.props.laravel.user.name}
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <div className="container">
            <div className="row">
              <div className="col-3">
                <div className="nav flex-column nav-pills">
                  <NavLink exact className="nav-link" to="/">
                    Overview
                  </NavLink>
                  <NavLink className="nav-link" to="/settings">
                    Settings
                  </NavLink>
                </div>
              </div>
              <div className="col-9">
                <Route exact path="/" component={Home} />
                <Route exact path="/settings" component={Settings} />
              </div>
            </div>
          </div>
        </div>
      </Router>
    )
  }
}

if (document.getElementById('app')) {
  ReactDOM.render(
    <Dashboard laravel={window.Laravel} />,
    document.getElementById('app')
  )
}
