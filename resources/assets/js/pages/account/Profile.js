import React, { Component } from 'react'
import Card from '../../components/Card'

class Profile extends Component {
  render() {
    const { session } = this.props

    return (
      <Card title="Profile">
        <form onSubmit={this.handleSubmit}>
          <div>
            <div className="form-group">
              <label className="col-form-label">First Name</label>
              <input
                className="form-control"
                type="text"
                defaultValue={session.user.first_name}
              />
            </div>

            <div className="form-group">
              <label className="col-form-label">Last Name</label>
              <input
                className="form-control"
                type="text"
                defaultValue={session.user.last_name}
              />
            </div>
          </div>
        </form>
      </Card>
    )
  }
}

export default Profile
