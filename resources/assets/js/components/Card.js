import React from 'react'

const Card = props => {
  return (
    <div className="card border-0">
      <div className="card-header">{props.title}</div>
      <div className="card-body">{props.children}</div>
    </div>
  )
}

export default Card
