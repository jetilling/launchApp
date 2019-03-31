import React from 'react'
import { connect } from 'react-redux'
import {updateUserIsDeveloper} from '../../actions'
import '../../../styles/developer.css'

const mapStateToProps = (state, ownProps) => {
  return {
  }
}

const mapDispatchToProps = (dispatch, ownProps) => {
  return {
    updateUserIsDeveloper: (value) => {dispatch(updateUserIsDeveloper(value))}
  }
}

const Developer = ({updateUserIsDeveloper}) =>  {

  return (
    <div>
      <h2>We're excited to see what you create!</h2>

      <h4>Let's get started. Are you a developer?</h4>

      <p>Selecting "Yep, I'm a developer" will allow you to have more control over your data model and the structure of your application</p>
      <p>Selecting "No, but I'd like an estimate" will walk you through a more simplified builder that will create a real-time estimate. If you
         agree to continue with the estimate, then one of our software engineers will work with you to finish building your application.
      </p>

      <button onClick={()=>{updateUserIsDeveloper(true)}}>Yep, I'm a developer</button>
      <button onClick={()=>{updateUserIsDeveloper(false)}}>No, but I'd like to get an estimate for my app</button>
      
    </div>
  )
}

const DeveloperContainer = connect(
  mapStateToProps,
  mapDispatchToProps
)(Developer)

export default DeveloperContainer