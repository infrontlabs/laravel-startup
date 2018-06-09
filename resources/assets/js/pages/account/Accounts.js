import React from 'react'
import Card from '../../components/Card'

const Accounts = props => {
  const { session } = props

  return (
    <Card title="Accounts">
      {session.user.accounts.map(account => (
        <p key={account.name}>{account.name}</p>
      ))}
    </Card>
  )
}

export default Accounts
