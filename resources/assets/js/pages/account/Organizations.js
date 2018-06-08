import React from 'react'
import Card from '../../components/Card'

const Organizations = props => {
  const { session } = props

  return (
    <Card title="Organizations">
      {session.user.orgs.map(org => <p key={org.name}>{org.name}</p>)}
    </Card>
  )
}

export default Organizations
