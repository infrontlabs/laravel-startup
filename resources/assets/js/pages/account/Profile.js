import React, { Component } from 'react'

class Profile extends Component {
  constructor(props) {
    super(props)
    this.state = {
      error: null,
      isLoaded: false,
      user: {}
    }
  }

  componentDidMount() {
    const request = window.axios('/api/user')
    request.then(response => response.data).then(user => {
      this.setState({
        isLoaded: true,
        user
      })
    })
  }

  render() {
    const { isLoaded, user } = this.state

    return (
      <div>
        <div className="card-header">Profile</div>
        <div className="card-body">
          <form onSubmit={this.handleSubmit}>
            {!isLoaded ? (
              'Loading...'
            ) : (
              <input className="form-control" type="text" value={user.name} />
            )}
          </form>
        </div>
      </div>
    )
  }
}

export default Profile
